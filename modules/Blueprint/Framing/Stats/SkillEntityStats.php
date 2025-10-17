<?php

namespace Modules\Blueprint\Framing\Stats;

use Modules\Blueprint\Skills\AbstractSkill;

class SkillEntityStats
{
    /** @var AbstractSkill[]   */
    private array $collection = [];

    public function add(string $skill): self
    {
        $this->collection[] = $skill;
        return $this;
    }

}
