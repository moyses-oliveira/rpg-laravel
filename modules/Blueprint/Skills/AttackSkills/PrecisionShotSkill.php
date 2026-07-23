<?php

namespace Modules\Blueprint\Skills\AttackSkills;

use Modules\Blueprint\Framing\Stats\TargetAttackStat;

class PrecisionShotSkill extends AbstractAttackSkill
{
    public function tune(TargetAttackStat $stat): void
    {
        $stat->addAim(5);
    }

    public function label(): string
    {
        return 'PRECISION_SHOT';
    }
}
