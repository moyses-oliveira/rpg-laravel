<?php

namespace Modules\Blueprint\Framing\Stats;

class ConsumableStat extends AbstractMutableStat
{
    private int $_spend = 0;

    public function trySpend(int $amount): bool
    {
        if ($amount < 1)
            return false;

        if ($this->exceedSpendLimit($amount))
            return false;

        $this->spend($amount);
        return true;
    }

    public function spend(int $amount): void
    {
        if ($amount < 1)
            return;

        if ($this->exceedSpendLimit($amount)):
            $this->_spend = $this->_base + $this->_mod;
            return;
        endif;
        $this->_spend += $amount;
    }

    private function exceedSpendLimit(int $amount): bool
    {
        $total = $this->_spend + $amount;
        $limit = $this->_base + $this->_mod;
        return $total > $limit;
    }

    public function recover(int $amount): void
    {
        if ($amount < 1)
            return;

        $this->_spend = max(0, $this->_spend - $amount);
    }

    public function reset(): void
    {
        $this->_spend = 0;
    }

    public function current(): int
    {
        return ($this->_base + $this->_mod) - $this->_spend;
    }
}
