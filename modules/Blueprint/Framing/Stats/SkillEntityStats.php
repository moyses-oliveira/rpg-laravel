<?php

namespace Modules\Blueprint\Framing\Stats;

use App\Blueprint\Skills\AbstractSkill;

class SkillEntityStats
{
    /** @var AbstractSkill[]   */
    private array $collection = [];

    public function add(AbstractSkill $skill): array
    {
        return $this->collection[] = $skill;
    }

    public function hasSkill()
    {

    }
}
