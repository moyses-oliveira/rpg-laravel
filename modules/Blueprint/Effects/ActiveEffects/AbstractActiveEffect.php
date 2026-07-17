<?php

namespace Modules\Blueprint\Effects\ActiveEffects;

use Modules\Blueprint\Framing\Sets\Contracts\ItemSetInterface;

abstract class AbstractActiveEffect implements ItemSetInterface
{

    private int $_slots = 0;

    public function __construct(int $slots)
    {
        $this->_slots = $slots;
    }

    public function expend():int
    {
        $this->_slots--;
        return $this->_slots;
    }

    public function slots():int
    {
        return $this->_slots;
    }
}
