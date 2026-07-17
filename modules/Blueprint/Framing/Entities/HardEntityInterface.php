<?php
namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Stats\ConsumableStat;

interface HardEntityInterface
{

    public function hp():ConsumableStat;
}
