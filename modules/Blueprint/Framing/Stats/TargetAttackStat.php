<?php

namespace Modules\Blueprint\Framing\Stats;

use Modules\Blueprint\Battle\AttackOutcome;
use Modules\Blueprint\Equipment\WeaponInterface;

class TargetAttackStat
{
    private MutableStat $_aim;
    private MutableStat $_range;
    private MutableStat $_dodge;
    private MutableStat $_will;
    private MutableStat $_criticalHit;

    private ?TunesTargetAttackInterface $_selectedSkill  = null;
    private ?WeaponInterface            $_selectedWeapon = null;

    public function __construct(MutableStat $_aim, MutableStat $_range, MutableStat $_dodge, MutableStat $_will, MutableStat $_criticalHit)
    {
        $this->define($_aim, $_range, $_dodge, $_will, $_criticalHit);
    }

    public function define(MutableStat $_aim, MutableStat $_range, MutableStat $_dodge, MutableStat $_will, MutableStat $_criticalHit): void
    {
        $this->_aim         = $_aim;
        $this->_range       = $_range;
        $this->_dodge       = $_dodge;
        $this->_will        = $_will;
        $this->_criticalHit = $_criticalHit;
    }

    /**
     * Seeds a fresh combat context from attacker and defender base values.
     * Attacker contributes aim/range/criticalHit; defender contributes dodge/will as resistance.
     * Caps follow the same rules as entity stats: percentage-based capped at 100, range at 30.
     */
    public static function fromContext(
        int $attackerAim,
        int $attackerRange,
        int $defenderDodge,
        int $defenderWill,
        int $attackerCriticalHit
    ): self {
        return new self(
            new MutableStat($attackerAim,         100),
            new MutableStat($attackerRange,         30),
            new MutableStat($defenderDodge,        100),
            new MutableStat($defenderWill,         100),
            new MutableStat($attackerCriticalHit,  100)
        );
    }

    public function aim(): int         { return $this->_aim->current(); }
    public function range(): int       { return $this->_range->current(); }
    public function dodge(): int       { return $this->_dodge->current(); }
    public function will(): int        { return $this->_will->current(); }
    public function criticalHit(): int { return $this->_criticalHit->current(); }

    public function addAim(int $value): void         { $this->_aim->addMod($value); }
    public function addRange(int $value): void       { $this->_range->addMod($value); }
    public function addDodge(int $value): void       { $this->_dodge->addMod($value); }
    public function addWill(int $value): void        { $this->_will->addMod($value); }
    public function addCriticalHit(int $value): void { $this->_criticalHit->addMod($value); }

    public function selectSkill(TunesTargetAttackInterface $skill): self
    {
        $this->_selectedSkill = $skill;
        return $this;
    }

    public function selectWeapon(WeaponInterface $weapon): self
    {
        $this->_selectedWeapon = $weapon;
        return $this;
    }

    public function applyTuning(): void
    {
        $this->_selectedSkill?->tune($this);
        $this->_selectedWeapon?->tune($this);
    }

    public function resetAllMods(): void
    {
        $this->_aim->resetMod();
        $this->_range->resetMod();
        $this->_dodge->resetMod();
        $this->_will->resetMod();
        $this->_criticalHit->resetMod();
    }

    /**
     * Resolves the attack outcome using the current buffed/nerfed stat values.
     *
     * Hit chance   = aim%   (e.g. aim=65 → 65% hit, threshold = 36 on d100)
     * Dodge chance = dodge% (high defender dodge = hard to connect fully)
     * Crit chance  = criticalHit% (0 = never crits)
     *
     * All chances are clamped to [5%, 95%] so no stat guarantees certainty.
     * An injectable $roll callable (returns int 1-100) allows deterministic testing.
     */
    public function resolve(?callable $roll = null): AttackOutcome
    {
        $roll ??= static fn() => rand(1, 100);

        $aimThreshold = min(96, max(6, 101 - $this->aim()));
        $aimRoll      = $roll();
        $hit          = $aimRoll >= $aimThreshold;

        $dodgeThreshold = min(96, max(6, 101 - $this->dodge()));
        $dodgeRoll      = $roll();
        $dodged         = $hit && ($dodgeRoll >= $dodgeThreshold);

        $critThreshold = $this->criticalHit() > 0
            ? min(96, max(6, 101 - $this->criticalHit()))
            : 101; // impossible threshold when crit stat is 0
        $critRoll = $roll();
        $critical = $hit && !$dodged && ($critRoll >= $critThreshold);

        return new AttackOutcome(
            $hit, $dodged, $critical,
            $aimRoll, $aimThreshold,
            $dodgeRoll, $dodgeThreshold,
            $critRoll, $critThreshold
        );
    }
}
