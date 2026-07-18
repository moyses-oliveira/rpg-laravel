<?php

namespace Modules\Blueprint\Framing\Stats;

abstract class AbstractMutableStat implements MutableStatInterface
{
    protected int $_base;
    protected int $_mod    = 0;
    protected int $_maxMod = 0;
    protected int $_minMod = 0;

    public function __construct(int $base, int $max, int $min = 0)
    {
        $this->redefine($base, $max, $min);
    }

    public function redefine(int $base, int $max, int $min = 0): void
    {
        $this->_base   = $base;
        $this->_maxMod = $max - $base;
        $this->_minMod = $min - $base;
    }

    public function resetMod(): void
    {
        $this->_mod = 0;
    }

    public function addMod(int $mod): void
    {
        $this->_mod = max($this->_minMod, min($this->_mod + $mod, $this->_maxMod));
    }

    public function base(): int
    {
        return $this->_base;
    }

    public function max(): int
    {
        return $this->_base + $this->_maxMod;
    }
}
