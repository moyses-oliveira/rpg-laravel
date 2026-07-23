<?php

namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Equipment\WeaponInterface;
use Modules\Blueprint\Framing\Stats\BattleStats;
use Modules\Blueprint\Framing\Stats\InteractiveTokenStats;
use Modules\Blueprint\Framing\Stats\PositionStats;
use Modules\Blueprint\Framing\Stats\TargetAttackStat;
use Modules\Blueprint\Skills\Contracts\SkillInterface;
use Modules\Blueprint\Skills\Contracts\TargetAttackSkillInterface;

abstract class BoardAgentEntity extends AnimusEntity implements BoardAgentInterface
{
    public string $name;
    private InteractiveTokenStats $_token;
    private PositionStats $_position;
    private BattleStats $_battle;

    /** @var SkillInterface[] */
    private array $_boardSkills = [];

    private ?WeaponInterface $_weapon = null;

    public function __construct()
    {
        parent::__construct();
        $this->_token   = new InteractiveTokenStats();
        $this->_position = new PositionStats();
        $this->_battle  = new BattleStats();
    }

    public function token(): InteractiveTokenStats
    {
        return $this->_token;
    }

    public function position(): PositionStats
    {
        return $this->_position;
    }

    public function battle(): BattleStats
    {
        return $this->_battle;
    }

    public function addSkill(SkillInterface $skill): void
    {
        $this->_boardSkills[] = $skill;
    }

    public function getSkills(): array
    {
        return $this->_boardSkills;
    }

    public function equipWeapon(WeaponInterface $weapon): void
    {
        $this->_weapon = $weapon;
    }

    public function getWeapon(): ?WeaponInterface
    {
        return $this->_weapon;
    }

    public function prepareTargetAttack(BoardAgentInterface $target): TargetAttackStat
    {
        $a = $this->battle()->targetAttack();
        $d = $target->battle()->targetAttack();

        $context = TargetAttackStat::fromContext(
            $a->aim(),
            $a->range(),
            $d->dodge(),
            $d->will(),
            $a->criticalHit()
        );

        foreach ($this->getSkills() as $skill) {
            if ($skill instanceof TargetAttackSkillInterface) {
                $skill->tune($context);
            }
        }

        return $context;
    }
}
