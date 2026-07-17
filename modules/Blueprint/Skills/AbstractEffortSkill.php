<?php

namespace Modules\Blueprint\Skills;

use Modules\Blueprint\Framing\Entities\BoardAgentInterface;
use Modules\Blueprint\Framing\Entities\InteractiveEntityInterface;
use Modules\Blueprint\Skills\Contracts\EffortSkillInterface;

abstract class AbstractEffortSkill extends AbstractSkill implements EffortSkillInterface
{
    const TYPE = SkillTypeEnum::PASSIVE;

    public function apply(InteractiveEntityInterface $entity, array $targets = []):void
    {
        if(count($targets) > 0)
            throw new SkillUsageException('Effort is applied to Owner only.');

        if(!$this->isBoardAgent($entity))
            throw new SkillUsageException('$entity must belong to BoardAgentInterface.');

        $this->makeEffort($entity);
    }




}
