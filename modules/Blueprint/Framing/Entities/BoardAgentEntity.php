<?php

namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Stats\BattleStats;
use Modules\Blueprint\Framing\Stats\InteractiveTokenStats;
use Modules\Blueprint\Framing\Stats\PositionStats;
use Modules\Blueprint\Skills\Contracts\SkillInterface;

abstract class BoardAgentEntity extends AnimusEntity implements BoardAgentInterface
{
    private InteractiveTokenStats $_token;
    private PositionStats $_position;
    private BattleStats $_battle;

    /** @var SkillInterface[] */
    private array $_boardSkills = [];

    public function __construct()
    {
        parent::__construct();
        $this->_token   = new InteractiveTokenStats();
        $this->_position = new PositionStats();
        $this->_battle  = new BattleStats();
    }

    public function token(): InteractiveTokenStats
    {
        return $this->_token;
    }

    public function position(): PositionStats
    {
        return $this->_position;
    }

    public function battle(): BattleStats
    {
        return $this->_battle;
    }

    public function addSkill(SkillInterface $skill): void
    {
        $this->_boardSkills[] = $skill;
    }

    public function getSkills(): array
    {
        return $this->_boardSkills;
    }
}
