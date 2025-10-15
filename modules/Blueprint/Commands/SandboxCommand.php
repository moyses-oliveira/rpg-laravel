<?php

namespace Modules\Blueprint\Commands;

use Illuminate\Console\Command;

class SandboxCommand extends Command
{
    protected $signature = 'blueprint:sandbox';

    public function handle(): void
    {
        $this->info('hello world!');
    }

}
