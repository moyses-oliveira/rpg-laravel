<?php

namespace Modules\Blueprint\Skills\EffortSkills;

use Modules\Blueprint\Framing\Entities\BoardAgentInterface;
use Modules\Blueprint\Framing\Stats\AnimusAttributeEnum;
use Modules\Blueprint\Skills\AbstractEffortSkill;

class MasterAimSkill extends AbstractEffortSkill
{
    const ALIAS = 'MASTER_AIM';
    const ATTRIBUTE = AnimusAttributeEnum::DX;

    public function makeEffort(BoardAgentInterface $entity): void
    {
        $entity->battle()->getAim()->addMod(20);
    }
}
