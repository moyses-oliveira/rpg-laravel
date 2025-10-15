<?php

namespace Modules\Blueprint\Framing\Entities;

use App\Blueprint\Framing\Stats\HPEntityAttributesStats;

class HardEntity implements HardEntityInterface
{
    private HPEntityAttributesStats $hp;

    public function __construct()
    {
        $this->hp = new HPEntityAttributesStats();
    }

    public function getHp(): HPEntityAttributesStats
    {
        return $this->hp;
    }

}
