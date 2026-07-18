<?php

namespace Modules\Blueprint\Framing\Stats;

interface TunesTargetAttackInterface
{
    public function tune(TargetAttackStat $stat): void;
}
