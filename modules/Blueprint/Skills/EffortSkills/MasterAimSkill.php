<?php

namespace Modules\Blueprint\Skills\EffortSkills;

use Modules\Blueprint\Framing\Stats\TargetAttackStat;
use Modules\Blueprint\Skills\AbstractTargetAttackSkill;

class MasterAimSkill extends AbstractTargetAttackSkill
{
    public function tune(TargetAttackStat $stat): void
    {
        $stat->addAim(20);
    }

    public function label(): string
    {
        return 'MASTER_AIM';
    }
}
