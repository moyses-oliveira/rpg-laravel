<?php

namespace Modules\Blueprint\Framing\Stats;

class AnimusStats
{
    private int $dx = 0;
    private int $st = 0;
    private int $ct = 0;
    private int $iq = 0;
    private int $ch = 0;
    private int $ws = 0;

    public function define(int $dx, int $st, int $ct, int $iq, int $ch, int $ws): void
    {
        $this->dx = $dx;
        $this->st = $st;
        $this->ct = $ct;
        $this->iq = $iq;
        $this->ch = $ch;
        $this->ws = $ws;
    }

    public function DX(): int
    {
        return $this->dx;
    }

    public function ST(): int
    {
        return $this->st;
    }

    public function CO(): int
    {
        return $this->ct;
    }

    public function IN(): int
    {
        return $this->iq;
    }

    public function CH(): int
    {
        return $this->ch;
    }

    public function WI(): int
    {
        return $this->ws;
    }

    public function modDX(int $value): self
    {
        $this->dx += $value;
        return $this;
    }

    public function modST(int $value): self
    {
        $this->st += $value;
        return $this;
    }

    public function modCT(int $value): self
    {
        $this->ct += $value;
        return $this;
    }

    public function modIQ(int $value): self
    {
        $this->iq += $value;
        return $this;
    }

    public function modCH(int $value): self
    {
        $this->ch += $value;
        return $this;
    }

    public function modWS(int $value): self
    {
        $this->ws += $value;
        return $this;
    }
}
