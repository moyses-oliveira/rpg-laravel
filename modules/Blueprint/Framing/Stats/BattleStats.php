<?php

namespace Modules\Blueprint\Framing\Stats;

use Modules\Blueprint\Effects\ActiveEffects\AbstractActiveEffect;
use Modules\Blueprint\Framing\Sets\ActiveEffectSet;

class BattleStats
{
    private MutableStat $_aim;
    private MutableStat $_range;
    private MutableStat $_armor;
    private MutableStat $_dodge;
    private MutableStat $_will;
    private MutableStat $_initiative;
    private ConsumableStat $_mp;
    private ConsumableStat $_hp;

    /** @var ActiveEffectSet */
    private ActiveEffectSet $_activeEffects;

    public function __construct()
    {
        $this->_aim = new MutableStat(0, 50);
        $this->_range = new MutableStat(0, 10);
        $this->_armor = new MutableStat(0, 50);
        $this->_dodge = new MutableStat(0, 30);
        $this->_will = new MutableStat(0, 100);
        $this->_initiative = new MutableStat(0, 100);
        $this->_mp = new ConsumableStat(0, 0);
        $this->_hp = new ConsumableStat(0, 0);
        $this->_activeEffects = new ActiveEffectSet();
    }

    public function getAim(): MutableStat
    {
        return $this->_aim;
    }

    public function getRange(): MutableStat
    {
        return $this->_range;
    }

    public function getArmor(): MutableStat
    {
        return $this->_armor;
    }

    public function getDodge(): MutableStat
    {
        return $this->_dodge;
    }

    public function getWill(): MutableStat
    {
        return $this->_will;
    }

    public function initiative(): MutableStat
    {
        return $this->_initiative;
    }

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

    public function activeEffects():ActiveEffectSet
    {
        return $this->_activeEffects;
    }


}
