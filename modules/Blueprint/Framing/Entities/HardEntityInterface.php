<?php
namespace Modules\Blueprint\Framing\Entities;

use App\Blueprint\Framing\Stats\HPEntityAttributesStats;

interface HardEntityInterface
{

    public function getHp():HPEntityAttributesStats;
}
