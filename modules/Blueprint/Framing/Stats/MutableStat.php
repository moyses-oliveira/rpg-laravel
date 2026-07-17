<?php

namespace Modules\Blueprint\Framing\Stats;

class MutableStat extends AbstractMutableStat
{

    public function current(): int
    {
        return $this->_base + $this->_mod;
    }
}
