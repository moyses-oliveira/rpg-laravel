<?php

namespace Modules\Blueprint\Equipment\Weapons;

use Modules\Blueprint\Equipment\WeaponInterface;
use Modules\Blueprint\Framing\Stats\TargetAttackStat;

class SniperRifleWeapon implements WeaponInterface
{
    public function label(): string
    {
        return 'SNIPER_RIFLE';
    }

    public function damage(): int
    {
        return 4;
    }

    public function tune(TargetAttackStat $stat): void {}

}
