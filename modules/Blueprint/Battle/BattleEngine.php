<?php

namespace Modules\Blueprint\Battle;

use Modules\Blueprint\Framing\Entities\BoardAgentInterface;
use Modules\Blueprint\Skills\AttackSkills\AbstractAttackSkill;

class BattleEngine
{
    private const MAX_ROUNDS = 20;

    public function run(BoardAgentInterface $player, BoardAgentInterface $npc): BattleResult
    {
        $log = [];

        $this->rollInitiative($player, $npc, $log);

        $order = $player->token()->getInitiative() >= $npc->token()->getInitiative()
            ? [$player, $npc]
            : [$npc, $player];

        $log[] = sprintf(
            'Turn order: %s (init %d) → %s (init %d)',
            $order[0]->name, $order[0]->token()->getInitiative(),
            $order[1]->name, $order[1]->token()->getInitiative()
        );

        $rounds = 0;
        $winner = null;

        while ($rounds < self::MAX_ROUNDS) {
            $rounds++;
            $log[] = sprintf('--- Round %d ---', $rounds);

            foreach ($order as $attacker) {
                $defender = ($attacker === $player) ? $npc : $player;

                if ($this->isDead($attacker) || $this->isDead($defender)) {
                    continue;
                }

                $skill = $this->findAttackSkill($attacker);
                if ($skill === null) {
                    $log[] = sprintf('%s has no attack skill.', $attacker->name);
                    continue;
                }

                // 1. Seed context + apply passive skill tuning (mastery buffs, etc.)
                $context = $attacker->prepareTargetAttack($defender);

                // 2. Select the active attack skill (chosen from frontend)
                $context->selectSkill($skill);

                // 3. Select weapon — seeds base damage and applies weapon tuning
                $weapon = $attacker->getWeapon();
                if ($weapon !== null) {
                    $context->selectWeapon($weapon);
                }

                // 4. Apply all selected tuning, then resolve
                $context->applyTuning();
                $outcome = $context->resolve();

                if ($outcome->isHit()) {
                    $dmg = $weapon !== null ? $context->damage() : $skill->damage();

                    if ($outcome->isCritical()) {
                        $dmg *= 2;
                    }
                    if ($outcome->isDodged()) {
                        $dmg = (int) floor($dmg / 2);
                    }

                    $defender->battle()->hp()->spend($dmg);

                    $log[] = sprintf(
                        '%s → %s  HIT  (roll %2d/≥%2d)  %s%sdmg -%d  %s HP: %d/%d',
                        $attacker->name,
                        $defender->name,
                        $outcome->aimRoll(),
                        $outcome->aimThreshold(),
                        $outcome->isDodged()
                            ? sprintf('DODGE (roll %2d/≥%2d) halved  ', $outcome->dodgeRoll(), $outcome->dodgeThreshold())
                            : sprintf('no dodge (roll %2d/≥%2d)  ',     $outcome->dodgeRoll(), $outcome->dodgeThreshold()),
                        $outcome->isCritical() ? 'CRIT  ' : '',
                        $dmg,
                        $defender->name,
                        $defender->battle()->hp()->current(),
                        $defender->battle()->hp()->max()
                    );
                } else {
                    $log[] = sprintf(
                        '%s → %s  MISS (roll %2d/≥%2d)',
                        $attacker->name,
                        $defender->name,
                        $outcome->aimRoll(),
                        $outcome->aimThreshold()
                    );
                }

                $attacker->token()->spendAction();

                if ($this->isDead($defender)) {
                    $winner = $attacker;
                    break 2;
                }
            }

            foreach ($order as $agent) {
                $agent->token()->resetTurn();
            }
        }

        if ($winner === null) {
            $winner = $player->battle()->hp()->current() >= $npc->battle()->hp()->current()
                ? $player
                : $npc;
            $log[] = sprintf('Round limit reached — %s survives with more HP.', $winner->name);
        }

        return new BattleResult($winner, $rounds, $log);
    }

    private function rollInitiative(BoardAgentInterface $player, BoardAgentInterface $npc, array &$log): void
    {
        $pInit = rand(1, 20) + (int) ($player->animus()->DX() / 2);
        $nInit = rand(1, 20) + (int) ($npc->animus()->DX() / 2);

        $player->token()->setInitiative($pInit);
        $npc->token()->setInitiative($nInit);

        $log[] = sprintf(
            'Initiative roll → %s: %d  |  %s: %d',
            $player->name, $pInit,
            $npc->name,   $nInit
        );
    }

    private function isDead(BoardAgentInterface $agent): bool
    {
        return $agent->battle()->hp()->current() <= 0;
    }

    private function findAttackSkill(BoardAgentInterface $agent): ?AbstractAttackSkill
    {
        foreach ($agent->getSkills() as $skill) {
            if ($skill instanceof AbstractAttackSkill) {
                return $skill;
            }
        }
        return null;
    }
}
