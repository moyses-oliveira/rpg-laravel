<?php

namespace Modules\Blueprint\Battle;

use Modules\Blueprint\Framing\Entities\BoardAgentInterface;

class BattleResult
{
    private BoardAgentInterface $winner;
    private int $rounds;
    private array $log;

    public function __construct(BoardAgentInterface $winner, int $rounds, array $log)
    {
        $this->winner = $winner;
        $this->rounds = $rounds;
        $this->log    = $log;
    }

    public function winner(): BoardAgentInterface
    {
        return $this->winner;
    }

    public function rounds(): int
    {
        return $this->rounds;
    }

    public function log(): array
    {
        return $this->log;
    }
}
