<?php

namespace Modules\Blueprint\Skills\Contracts;

use Modules\Blueprint\Framing\Entities\BoardAgentInterface;

interface EffortSkillInterface
{
    public function makeEffort(BoardAgentInterface $entity):void;
}
