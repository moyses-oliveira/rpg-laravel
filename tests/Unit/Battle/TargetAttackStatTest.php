<?php

namespace Tests\Unit\Battle;

use Modules\Blueprint\Agents\HumanSniperAgent;
use Modules\Blueprint\Enemies\SectoidEnemyAgent;
use Modules\Blueprint\Equipment\WeaponInterface;
use Modules\Blueprint\Framing\Stats\MutableStat;
use Modules\Blueprint\Framing\Stats\TargetAttackStat;
use Modules\Blueprint\Framing\Stats\TunesTargetAttackInterface;
use PHPUnit\Framework\TestCase;

class TargetAttackStatTest extends TestCase
{
    // -----------------------------------------------------------------------
    // Helpers
    // -----------------------------------------------------------------------

    private function stat(int $aim, int $range, int $dodge, int $will, int $crit): TargetAttackStat
    {
        return new TargetAttackStat(
            new MutableStat($aim,   100),
            new MutableStat($range,  30),
            new MutableStat($dodge, 100),
            new MutableStat($will,  100),
            new MutableStat($crit,  100)
        );
    }

    /** Produces a deterministic roll sequence; throws on exhaustion. */
    private function seq(int ...$rolls): callable
    {
        $remaining = $rolls;
        return function () use (&$remaining) {
            if (empty($remaining)) {
                throw new \UnderflowException('Roll sequence exhausted.');
            }
            return array_shift($remaining);
        };
    }

    // -----------------------------------------------------------------------
    // Seeding from entity context
    // -----------------------------------------------------------------------

    public function test_fromContext_seeds_aim_from_attacker(): void
    {
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $ctx = TargetAttackStat::fromContext(
            $sniper->battle()->targetAttack()->aim(),
            $sniper->battle()->targetAttack()->range(),
            $sectoid->battle()->targetAttack()->dodge(),
            $sectoid->battle()->targetAttack()->will(),
            $sniper->battle()->targetAttack()->criticalHit()
        );

        $this->assertEquals($sniper->battle()->targetAttack()->aim(),   $ctx->aim());
        $this->assertEquals($sniper->battle()->targetAttack()->range(), $ctx->range());
    }

    public function test_fromContext_seeds_dodge_and_will_from_defender(): void
    {
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $ctx = TargetAttackStat::fromContext(
            $sniper->battle()->targetAttack()->aim(),
            $sniper->battle()->targetAttack()->range(),
            $sectoid->battle()->targetAttack()->dodge(),
            $sectoid->battle()->targetAttack()->will(),
            $sniper->battle()->targetAttack()->criticalHit()
        );

        $this->assertEquals($sectoid->battle()->targetAttack()->dodge(), $ctx->dodge());
        $this->assertEquals($sectoid->battle()->targetAttack()->will(),  $ctx->will());
    }

    // -----------------------------------------------------------------------
    // Buff / nerf application
    // -----------------------------------------------------------------------

    public function test_addAim_increases_hit_stat(): void
    {
        $ctx = $this->stat(55, 10, 20, 50, 0);
        $ctx->addAim(20);
        $this->assertEquals(75, $ctx->aim());
    }

    public function test_addDodge_nerfing_reduces_defender_dodge(): void
    {
        $ctx = $this->stat(55, 10, 20, 50, 0);
        $ctx->addDodge(-10); // a skill that lowers defender's evasion
        $this->assertEquals(10, $ctx->dodge());
    }

    public function test_aim_clamps_at_max_100(): void
    {
        $ctx = $this->stat(90, 10, 20, 50, 0);
        $ctx->addAim(50);
        $this->assertEquals(100, $ctx->aim());
    }

    public function test_dodge_clamps_at_min_0(): void
    {
        $ctx = $this->stat(55, 10, 10, 50, 0);
        $ctx->addDodge(-50);
        $this->assertEquals(0, $ctx->dodge());
    }

    // -----------------------------------------------------------------------
    // resetAllMods
    // -----------------------------------------------------------------------

    public function test_resetAllMods_restores_all_base_values(): void
    {
        $ctx = $this->stat(65, 10, 20, 50, 0);

        $ctx->addAim(20);
        $ctx->addDodge(15);
        $ctx->addWill(10);

        $ctx->resetAllMods();

        $this->assertEquals(65, $ctx->aim());
        $this->assertEquals(20, $ctx->dodge());
        $this->assertEquals(50, $ctx->will());
    }

    // -----------------------------------------------------------------------
    // resolve() — hit / miss
    // aim=65 → threshold=36, hit when roll ≥ 36
    // -----------------------------------------------------------------------

    public function test_resolve_registers_hit_when_roll_meets_threshold(): void
    {
        $ctx     = $this->stat(65, 10, 20, 50, 0);
        $outcome = $ctx->resolve($this->seq(40, 1, 1)); // aimRoll=40 ≥ 36 → hit

        $this->assertTrue($outcome->isHit());
        $this->assertEquals(40, $outcome->aimRoll());
        $this->assertEquals(36, $outcome->aimThreshold());
    }

    public function test_resolve_registers_miss_when_roll_below_threshold(): void
    {
        $ctx     = $this->stat(65, 10, 20, 50, 0);
        $outcome = $ctx->resolve($this->seq(10, 1, 1)); // aimRoll=10 < 36 → miss

        $this->assertFalse($outcome->isHit());
        $this->assertFalse($outcome->isDodged());
        $this->assertFalse($outcome->isCritical());
    }

    // -----------------------------------------------------------------------
    // resolve() — dodge
    // dodge=80 → threshold=21, dodged when roll ≥ 21
    // dodge=5  → threshold=96, dodged when roll ≥ 96 (very hard)
    // -----------------------------------------------------------------------

    public function test_resolve_registers_dodge_when_defender_has_high_dodge(): void
    {
        $ctx     = $this->stat(65, 10, 80, 50, 0);
        $outcome = $ctx->resolve($this->seq(40, 50, 1)); // hit, dodgeRoll=50 ≥ 21 → dodged

        $this->assertTrue($outcome->isHit());
        $this->assertTrue($outcome->isDodged());
        $this->assertEquals(21, $outcome->dodgeThreshold());
    }

    public function test_resolve_does_not_dodge_when_defender_has_low_dodge(): void
    {
        $ctx     = $this->stat(65, 10, 5, 50, 0);
        $outcome = $ctx->resolve($this->seq(40, 1, 1)); // hit, dodgeRoll=1 < 96 → no dodge

        $this->assertTrue($outcome->isHit());
        $this->assertFalse($outcome->isDodged());
    }

    public function test_resolve_cannot_dodge_without_a_hit(): void
    {
        $ctx     = $this->stat(65, 10, 95, 50, 0); // high dodge
        $outcome = $ctx->resolve($this->seq(5, 99, 1)); // miss → dodge irrelevant

        $this->assertFalse($outcome->isHit());
        $this->assertFalse($outcome->isDodged());
    }

    // -----------------------------------------------------------------------
    // resolve() — critical hit
    // crit=50 → threshold=51, crit when roll ≥ 51 (and hit + not dodged)
    // crit=0  → threshold=101 (impossible)
    // -----------------------------------------------------------------------

    public function test_resolve_registers_critical_when_crit_roll_meets_threshold(): void
    {
        $ctx     = $this->stat(65, 10, 5, 50, 50); // crit=50 → critThreshold=51
        $outcome = $ctx->resolve($this->seq(40, 1, 60)); // hit, no dodge, critRoll=60 ≥ 51

        $this->assertTrue($outcome->isHit());
        $this->assertFalse($outcome->isDodged());
        $this->assertTrue($outcome->isCritical());
    }

    public function test_resolve_no_critical_when_crit_stat_is_zero(): void
    {
        $ctx     = $this->stat(65, 10, 5, 50, 0);
        $outcome = $ctx->resolve($this->seq(40, 1, 99)); // would crit if threshold < 99

        $this->assertTrue($outcome->isHit());
        $this->assertFalse($outcome->isCritical()); // critThreshold=101, impossible
    }

    public function test_resolve_cannot_critical_on_a_dodged_hit(): void
    {
        $ctx     = $this->stat(65, 10, 80, 50, 50); // high dodge + high crit
        $outcome = $ctx->resolve($this->seq(40, 50, 99)); // hit, dodged, high crit roll

        $this->assertTrue($outcome->isHit());
        $this->assertTrue($outcome->isDodged());
        $this->assertFalse($outcome->isCritical()); // crit blocked by dodge
    }

    // -----------------------------------------------------------------------
    // selectSkill / selectWeapon / applyTuning
    // -----------------------------------------------------------------------

    private function tuner(int $aim = 0, int $dodge = 0): TunesTargetAttackInterface
    {
        return new class($aim, $dodge) implements TunesTargetAttackInterface {
            public function __construct(private int $aim, private int $dodge) {}
            public function tune(TargetAttackStat $stat): void
            {
                if ($this->aim   !== 0) $stat->addAim($this->aim);
                if ($this->dodge !== 0) $stat->addDodge($this->dodge);
            }
        };
    }

    private function weaponTuner(int $aim = 0, int $dodge = 0): WeaponInterface
    {
        return new class($aim, $dodge) implements WeaponInterface {
            public function __construct(private int $aim, private int $dodge) {}
            public function tune(TargetAttackStat $stat): void
            {
                if ($this->aim   !== 0) $stat->addAim($this->aim);
                if ($this->dodge !== 0) $stat->addDodge($this->dodge);
            }
            public function label(): string  { return 'stub-weapon'; }
            public function damage(): int    { return 0; }
        };
    }

    public function test_selectSkill_applyTuning_applies_skill_tune(): void
    {
        $ctx = $this->stat(55, 10, 20, 50, 0);
        $ctx->selectSkill($this->tuner(aim: 20))->applyTuning();
        $this->assertEquals(75, $ctx->aim());
    }

    public function test_selectWeapon_applyTuning_applies_weapon_tune(): void
    {
        $ctx = $this->stat(55, 10, 20, 50, 0);
        $ctx->selectWeapon($this->weaponTuner(aim: 5, dodge: -5))->applyTuning();
        $this->assertEquals(60, $ctx->aim());
        $this->assertEquals(15, $ctx->dodge());
    }

    public function test_applyTuning_stacks_skill_and_weapon(): void
    {
        $ctx = $this->stat(55, 10, 20, 50, 0);
        $ctx->selectSkill($this->tuner(aim: 10))
            ->selectWeapon($this->weaponTuner(aim: 5))
            ->applyTuning();
        $this->assertEquals(70, $ctx->aim());
    }

    public function test_applyTuning_without_selection_is_a_noop(): void
    {
        $ctx = $this->stat(55, 10, 20, 50, 0);
        $ctx->applyTuning();
        $this->assertEquals(55, $ctx->aim());
        $this->assertEquals(20, $ctx->dodge());
    }

    public function test_passive_skills_applied_in_prepareTargetAttack(): void
    {
        // HumanSniperAgent has SniperMastery → MasterAimSkill (+20 aim)
        // prepareTargetAttack must apply it before BattleEngine selectSkill is called
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $ctx = $sniper->prepareTargetAttack($sectoid);

        // Base aim=55, MasterAimSkill adds +20 → effective aim=75
        $this->assertEquals(75, $ctx->aim());
    }

    // -----------------------------------------------------------------------
    // Boundary — aim/dodge clamped to [5%, 95%] hit/dodge chance
    // -----------------------------------------------------------------------

    public function test_resolve_threshold_clamped_so_aim_100_never_guarantees_hit(): void
    {
        $ctx     = $this->stat(100, 10, 20, 50, 0);
        $outcome = $ctx->resolve($this->seq(1, 1, 1)); // roll=1, threshold=6 → miss (1 < 6)

        // Even aim=100 can miss on a roll of 1-5 (5% floor)
        $this->assertEquals(6, $outcome->aimThreshold());
        $this->assertFalse($outcome->isHit());
    }

    public function test_resolve_threshold_clamped_so_aim_0_always_has_some_chance(): void
    {
        $ctx     = $this->stat(0, 10, 5, 50, 0);
        $outcome = $ctx->resolve($this->seq(96, 1, 1)); // roll=96, threshold=96 → hit

        // Even aim=0 can hit on a roll of 96-100 (5% ceiling chance)
        $this->assertEquals(96, $outcome->aimThreshold());
        $this->assertTrue($outcome->isHit());
    }
}
