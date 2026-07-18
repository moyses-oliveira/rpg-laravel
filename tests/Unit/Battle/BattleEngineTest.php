<?php

namespace Tests\Unit\Battle;

use Modules\Blueprint\Agents\HumanSniperAgent;
use Modules\Blueprint\Battle\BattleEngine;
use Modules\Blueprint\Enemies\SectoidEnemyAgent;
use PHPUnit\Framework\TestCase;

class BattleEngineTest extends TestCase
{
    // -----------------------------------------------------------------------
    // Basic contract
    // -----------------------------------------------------------------------

    public function test_battle_produces_a_winner(): void
    {
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $result = (new BattleEngine())->run($sniper, $sectoid);

        $this->assertNotNull($result->winner());
    }

    public function test_winner_is_one_of_the_participants(): void
    {
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $result = (new BattleEngine())->run($sniper, $sectoid);

        $this->assertContains($result->winner(), [$sniper, $sectoid]);
    }

    public function test_battle_ends_within_max_round_limit(): void
    {
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $result = (new BattleEngine())->run($sniper, $sectoid);

        $this->assertLessThanOrEqual(20, $result->rounds());
        $this->assertGreaterThanOrEqual(1, $result->rounds());
    }

    public function test_battle_produces_a_non_empty_log(): void
    {
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $result = (new BattleEngine())->run($sniper, $sectoid);

        $this->assertNotEmpty($result->log());
    }

    // -----------------------------------------------------------------------
    // Winner/loser HP integrity
    // -----------------------------------------------------------------------

    public function test_winner_has_at_least_as_much_hp_as_loser(): void
    {
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $result = (new BattleEngine())->run($sniper, $sectoid);

        $winner = $result->winner();
        $loser  = ($winner === $sniper) ? $sectoid : $sniper;

        $this->assertGreaterThanOrEqual(
            $loser->battle()->hp()->current(),
            $winner->battle()->hp()->current()
        );
    }

    // -----------------------------------------------------------------------
    // Balance — statistical over 200 trials
    // Sniper target: ~75% win rate (melee design doc)
    // Acceptable range: 55%–95% to stay tolerant of RNG variance
    // -----------------------------------------------------------------------

    public function test_sniper_wins_majority_of_duels(): void
    {
        $sniperWins = 0;
        $trials     = 200;

        for ($i = 0; $i < $trials; $i++) {
            $result = (new BattleEngine())->run(new HumanSniperAgent(), new SectoidEnemyAgent());
            if ($result->winner()->name === (new HumanSniperAgent())->name) {
                $sniperWins++;
            }
        }

        $rate = $sniperWins / $trials;

        $this->assertGreaterThanOrEqual(0.55, $rate,
            "Sniper win rate {$rate} is below expected floor of 55% over {$trials} trials."
        );
        $this->assertLessThanOrEqual(0.95, $rate,
            "Sniper win rate {$rate} is above expected ceiling of 95% over {$trials} trials."
        );
    }

    // -----------------------------------------------------------------------
    // Log structure
    // -----------------------------------------------------------------------

    public function test_log_contains_initiative_roll_entry(): void
    {
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $result = (new BattleEngine())->run($sniper, $sectoid);

        $hasInitiative = false;
        foreach ($result->log() as $entry) {
            if (str_contains($entry, 'Initiative roll')) {
                $hasInitiative = true;
                break;
            }
        }

        $this->assertTrue($hasInitiative, 'Log must contain an initiative roll entry.');
    }

    public function test_log_contains_round_markers(): void
    {
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $result = (new BattleEngine())->run($sniper, $sectoid);

        $hasRound = false;
        foreach ($result->log() as $entry) {
            if (str_contains($entry, 'Round')) {
                $hasRound = true;
                break;
            }
        }

        $this->assertTrue($hasRound, 'Log must contain round markers.');
    }
}
