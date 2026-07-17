<?php
namespace Modules\Blueprint\Skills;
use Modules\Blueprint\Framing\Entities\BoardAgentInterface;
use Modules\Blueprint\Framing\Entities\InteractiveEntityInterface;
use Modules\Blueprint\Skills\Contracts\SkillInterface;

abstract class AbstractSkill implements SkillInterface
{


    /**
     * Checks if the skill is a Board Agent.
     *
     * @return bool
     */
    public function isBoardAgent(InteractiveEntityInterface $entity): bool
    {
        return $entity instanceof BoardAgentInterface;
    }

}
