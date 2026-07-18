<?php

namespace Modules\Blueprint\Skills\AttackSkills;

class RifleShotSkill extends AbstractAttackSkill
{
    public function damage(): int
    {
        return 4;
    }

    public function label(): string
    {
        return 'RIFLE_SHOT';
    }
}
