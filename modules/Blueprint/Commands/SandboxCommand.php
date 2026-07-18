<?php

namespace Modules\Blueprint\Commands;

use Illuminate\Console\Command;
use Modules\Blueprint\Agents\HumanSniperAgent;
use Modules\Blueprint\Battle\BattleEngine;
use Modules\Blueprint\Enemies\SectoidEnemyAgent;

class SandboxCommand extends Command
{
    protected $signature = 'blueprint:sandbox';

    public function handle(): void
    {
        $sniper  = new HumanSniperAgent();
        $sectoid = new SectoidEnemyAgent();

        $this->line('');
        $this->info('=== BATTLE: ' . $sniper->name . ' vs ' . $sectoid->name . ' ===');
        $this->line('');

        $this->printAgentStats($sniper,  'Rifle 4dmg');
        $this->printAgentStats($sectoid, 'Plasma 3dmg');

        $this->line('');

        $engine = new BattleEngine();
        $result = $engine->run($sniper, $sectoid);

        foreach ($result->log() as $entry) {
            $this->line($entry);
        }

        $this->line('');
        $this->info(sprintf(
            '=== %s WINS in %d round(s) ===',
            strtoupper($result->winner()->name),
            $result->rounds()
        ));
        $this->line('');
    }

    private function printAgentStats(object $agent, string $weapon): void
    {
        $ta = $agent->battle()->targetAttack();
        $this->line(sprintf(
            '%-22s  HP %d/%d  Aim %2d  Range %2d  Dodge %2d  Will %2d  Crit %2d  [%s]',
            $agent->name,
            $agent->battle()->hp()->current(),
            $agent->battle()->hp()->max(),
            $ta->aim(),
            $ta->range(),
            $ta->dodge(),
            $ta->will(),
            $ta->criticalHit(),
            $weapon
        ));
    }
}
