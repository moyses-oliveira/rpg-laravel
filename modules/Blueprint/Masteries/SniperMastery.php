<?php

namespace Modules\Blueprint\Masteries;

use Modules\Blueprint\Skills\EffortSkills\MasterAimSkill;

class SniperMastery extends AbstractMastery
{
    public function apply(): void
    {
        $this->entity->addSkill(new MasterAimSkill());
    }
}
