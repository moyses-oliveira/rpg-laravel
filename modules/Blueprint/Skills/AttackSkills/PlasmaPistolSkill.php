<?php

namespace Modules\Blueprint\Skills\AttackSkills;

class PlasmaPistolSkill extends AbstractAttackSkill
{
    public function damage(): int
    {
        return 3;
    }

    public function label(): string
    {
        return 'PLASMA_PISTOL';
    }
}
