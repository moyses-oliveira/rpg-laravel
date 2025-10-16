<?php

namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Stats\HPEntityAttributesStats;

class HardEntity implements HardEntityInterface
{
    private HPEntityAttributesStats $_hp;

    public function __construct()
    {
        $this->_hp = new HPEntityAttributesStats();
    }

    public function hp(): HPEntityAttributesStats
    {
        return $this->_hp;
    }

}
