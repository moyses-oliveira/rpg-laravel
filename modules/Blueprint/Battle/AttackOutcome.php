<?php

namespace Modules\Blueprint\Battle;

class AttackOutcome
{
    public function __construct(
        private readonly bool $hit,
        private readonly bool $dodged,
        private readonly bool $critical,
        private readonly int  $aimRoll,
        private readonly int  $aimThreshold,
        private readonly int  $dodgeRoll,
        private readonly int  $dodgeThreshold,
        private readonly int  $critRoll,
        private readonly int  $critThreshold
    ) {}

    public function isHit(): bool      { return $this->hit; }
    public function isDodged(): bool   { return $this->dodged; }
    public function isCritical(): bool { return $this->critical; }

    public function aimRoll(): int        { return $this->aimRoll; }
    public function aimThreshold(): int   { return $this->aimThreshold; }
    public function dodgeRoll(): int      { return $this->dodgeRoll; }
    public function dodgeThreshold(): int { return $this->dodgeThreshold; }
    public function critRoll(): int       { return $this->critRoll; }
    public function critThreshold(): int  { return $this->critThreshold; }
}
