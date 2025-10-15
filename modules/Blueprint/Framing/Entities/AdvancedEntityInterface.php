<?php
namespace Modules\Blueprint\Framing\Entities;

use App\Blueprint\Framing\Stats\AdvancedEntityAttributesStats;

interface AdvancedEntityInterface
{
    public function atr(): AdvancedEntityAttributesStats;
}
