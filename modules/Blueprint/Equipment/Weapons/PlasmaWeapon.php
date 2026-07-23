<?php

namespace Modules\Blueprint\Equipment\Weapons;

use Modules\Blueprint\Equipment\WeaponInterface;
use Modules\Blueprint\Framing\Stats\TargetAttackStat;

class PlasmaWeapon implements WeaponInterface
{
    public function label(): string
    {
        return 'PLASMA_WEAPON';
    }

    public function damage(): int
    {
        return 3;
    }

    public function tune(TargetAttackStat $stat): void {}
}
