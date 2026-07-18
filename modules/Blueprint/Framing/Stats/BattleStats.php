<?php

namespace Modules\Blueprint\Framing\Stats;

use Modules\Blueprint\Effects\ActiveEffects\AbstractActiveEffect;
use Modules\Blueprint\Framing\Sets\ActiveEffectSet;

class BattleStats
{
    private TargetAttackStat $_targetAttack;
    private MutableStat $_armor;
    private MutableStat $_initiative;
    private ConsumableStat $_mp;
    private ConsumableStat $_hp;
    private ActiveEffectSet $_activeEffects;

    public function __construct()
    {
        $this->_targetAttack  = new TargetAttackStat(
            new MutableStat(0, 100),
            new MutableStat(0, 30),
            new MutableStat(0, 100),
            new MutableStat(0, 100),
            new MutableStat(0, 100)
        );
        $this->_armor         = new MutableStat(0, 50);
        $this->_initiative    = new MutableStat(0, 100);
        $this->_mp            = new ConsumableStat(0, 0);
        $this->_hp            = new ConsumableStat(0, 0);
        $this->_activeEffects = new ActiveEffectSet();
    }

    public function targetAttack(): TargetAttackStat
    {
        return $this->_targetAttack;
    }

    // --- Standalone stats ---

    public function getArmor(): MutableStat
    {
        return $this->_armor;
    }

    public function initiative(): MutableStat
    {
        return $this->_initiative;
    }

    // --- MP ---

    public function mp(): ConsumableStat
    {
        return $this->_mp;
    }

    public function spendMp(int $amount): bool
    {
        return $this->_mp->trySpend($amount);
    }

    public function recoverMp(int $amount): void
    {
        $this->_mp->recover($amount);
    }

    public function refreshMp(): void
    {
        $this->_mp->reset();
    }

    // --- HP ---

    public function hp(): ConsumableStat
    {
        return $this->_hp;
    }

    public function spendHp(int $amount): bool
    {
        return $this->_hp->trySpend($amount);
    }

    public function recoverHp(int $amount): void
    {
        $this->_hp->recover($amount);
    }

    public function refreshHp(): void
    {
        $this->_hp->reset();
    }

    // --- Active effects ---

    public function pushActiveEffect(AbstractActiveEffect $effect): void
    {
        $this->activeEffects()->add($effect);
    }

    public function removeActiveEffect(string $label): void
    {
        $this->activeEffects()->remove($label);
    }

    public function expendActiveEffects(): void
    {
        foreach ($this->activeEffects() as $label => $ef) {
            if ($ef->expend() < 1) {
                $this->removeActiveEffect($label);
            }
        }
    }

    public function activeEffects(): ActiveEffectSet
    {
        return $this->_activeEffects;
    }
}
