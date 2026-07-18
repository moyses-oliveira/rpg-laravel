<?php

namespace Modules\Blueprint\Agents;

use Modules\Blueprint\Framing\Entities\BoardAgentEntity;
use Modules\Blueprint\Framing\Stats\MutableStat;
use Modules\Blueprint\Masteries\SniperMastery;
use Modules\Blueprint\Skills\AttackSkills\RifleShotSkill;

class HumanSniperAgent extends BoardAgentEntity
{
    public function __construct()
    {
        parent::__construct();

        $this->name = 'Soldier (Sniper)';

        // Human baseline: agile (DX=14), average strength, decent constitution
        $this->animus()->define(14, 8, 10, 12, 8, 10);

        // HP: 8 current, 10 max (upgradeable with levels)
        $this->battle()->hp()->redefine(8, 10);

        // aim=55, range=10 tiles, dodge=15, will=50
        $this->battle()->targetAttack()->define(
            new MutableStat(55, 100),
            new MutableStat(10, 30),
            new MutableStat(15, 100),
            new MutableStat(50, 100),
            new MutableStat(0, 100)
        );

        SniperMastery::upgrade($this, 1);

        $this->addSkill(new RifleShotSkill());

        $this->token()->setPlayerControlled(true);
        $this->token()->setTokenKey('sniper');
        $this->token()->setTintColor(0x0000FF);
        $this->token()->setSightRange(8);
    }
}
