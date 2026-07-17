<?php

namespace Modules\Blueprint\Framing\Stats;

interface MutableStatInterface
{
    public function redefine(int $base, int $max):void;

    public function current(): int;
    public function base(): int;
    public function max(): int;
    public function addMod(int $mod): void;
    public function resetMod(): void;
}
