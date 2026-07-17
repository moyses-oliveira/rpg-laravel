<?php
namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Stats\AnimusStats;

interface AnimusEntityInterface
{
    public function animus(): AnimusStats;
}
