<?php

namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Stats\BattleStats;
use Modules\Blueprint\Framing\Stats\InteractiveTokenStats;
use Modules\Blueprint\Framing\Stats\PositionStats;
use Modules\Blueprint\Skills\Contracts\SkillInterface;

interface BoardAgentInterface extends AnimusEntityInterface, HardEntityInterface, InteractiveEntityInterface
{
    public function token(): InteractiveTokenStats;

    public function position(): PositionStats;

    public function battle(): BattleStats;

    public function addSkill(SkillInterface $skill): void;

    public function getSkills(): array;
}
