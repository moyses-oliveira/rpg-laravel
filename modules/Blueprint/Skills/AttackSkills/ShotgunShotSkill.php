<?php

namespace Modules\Blueprint\Skills\AttackSkills;

use Modules\Blueprint\Framing\Stats\TargetAttackStat;

class ShotgunShotSkill extends AbstractAttackSkill
{
    public function tune(TargetAttackStat $stat): void
    {
        $stat->addCriticalHit(25);
        $stat->addAim(-15);
    }

    public function label(): string
    {
        return 'SHOTGUN_SHOT';
    }
}
