<?php

namespace Modules\Blueprint\Framing\Sets\ActiveEffects;

abstract class AbstractActiveEffectSet implements ActiveEffectSetInterface
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
