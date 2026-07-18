<?php

namespace Modules\Blueprint\Equipment;

use Modules\Blueprint\Framing\Stats\TunesTargetAttackInterface;

interface WeaponInterface extends TunesTargetAttackInterface
{
    public function label(): string;

    public function damage(): int;
}
