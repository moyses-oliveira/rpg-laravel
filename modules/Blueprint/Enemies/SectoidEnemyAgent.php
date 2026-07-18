<?php

namespace Modules\Blueprint\Enemies;

use Modules\Blueprint\Framing\Entities\BoardAgentEntity;
use Modules\Blueprint\Framing\Stats\MutableStat;
use Modules\Blueprint\Skills\AttackSkills\PlasmaPistolSkill;

class SectoidEnemyAgent extends BoardAgentEntity
{
    public function __construct()
    {
        parent::__construct();

        $this->name = 'Sectoid';

        // Alien: high IQ/Wisdom (psionic), low physical stats
        $this->animus()->define(10, 6, 8, 16, 6, 14);

        // HP: weaker body than humans but nimble
        $this->battle()->hp()->redefine(6, 8);

        // aim=65, range=6 tiles, dodge=20 (nimble), will=60 (psionic discipline)
        $this->battle()->targetAttack()->define(
            new MutableStat(65, 100),
            new MutableStat(6, 15),
            new MutableStat(20, 100),
            new MutableStat(60, 100),
            new MutableStat(0, 100)
        );

        $this->addSkill(new PlasmaPistolSkill());

        $this->token()->setTokenKey('sectoid');
        $this->token()->setTintColor(0xFF0000);
        $this->token()->setSightRange(6);
    }
}
