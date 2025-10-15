<?php
namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Stats\AdvancedEntityAttributesStats;

interface AdvancedEntityInterface
{
    public function atr(): AdvancedEntityAttributesStats;
}
