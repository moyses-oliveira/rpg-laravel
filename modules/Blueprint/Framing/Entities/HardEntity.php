<?php

namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Stats\ConsumableStat;

class HardEntity implements HardEntityInterface, InteractiveEntityInterface
{
    private ConsumableStat $_hp;

    public function __construct()
    {
        $this->_hp = new ConsumableStat(0,0);
    }

    public function hp(): ConsumableStat
    {
        return $this->_hp;
    }

}
