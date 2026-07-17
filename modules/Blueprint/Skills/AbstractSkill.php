<?php
namespace Modules\Blueprint\Skills;
use Modules\Blueprint\Framing\Entities\BoardAgentInterface;
use Modules\Blueprint\Framing\Entities\InteractiveEntityInterface;
use Modules\Blueprint\Skills\Contracts\SkillInterface;

abstract class AbstractSkill implements SkillInterface
{
    const ALIAS = '';

    const ATTRIBUTE = null;
    const TYPE = null;


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
