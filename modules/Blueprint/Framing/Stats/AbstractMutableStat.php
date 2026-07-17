<?php

namespace Modules\Blueprint\Framing\Stats;

abstract class AbstractMutableStat implements MutableStatInterface
{
    protected int $_base;
    protected int $_mod = 0;
    protected int $_maxMod = 0;

    public function __construct(int $base, int $max)
    {
        $this->redefine($base, $max);
    }

    public function redefine(int $base, int $max):void
    {
        $this->_base = $base;
        $this->_maxMod = $max - $base;
    }

    public function resetMod(): void
    {
        $this->_mod = 0;
    }

    public function addMod(int $mod): void
    {
        $this->_mod = min($this->_mod + $mod, $this->_maxMod);
        if($this->base() + $this->_mod < 1)
            $this->_mod = 1 - $this->base();
    }

    public function base(): int
    {
        return $this->_base;
    }

    public function max():int
    {
        return $this->_base + $this->_maxMod;
    }


}
