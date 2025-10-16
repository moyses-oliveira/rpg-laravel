<?php
namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Stats\HPEntityAttributesStats;

interface HardEntityInterface
{

    public function hp():HPEntityAttributesStats;
}
