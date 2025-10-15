<?php

namespace Modules\Blueprint\Framing\Stats;

class HPEntityAttributesStats
{

    private int $_regular = 0;

    private int $_current = 0;

    public function reduce(int $amount):void
    {
        $this->_current = max($this->_current - $amount, 0);
    }

    public function heal(int $amount):void
    {
        $this->_current += $amount;
    }

    public function refresh():void
    {
        $this->_current = $this->_regular;
    }

    public function modify(int $regular):void
    {
        $this->_regular = $regular;
    }

    public function check():int
    {
        return $this->_current;
    }

    public function regular():int
    {
        return $this->_regular;
    }
}
