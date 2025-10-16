<?php

namespace Modules\Blueprint\Taxonomies\Kindreds;

use Modules\Blueprint\Framing\Entities\AdvancedEntityInterface;
use Modules\Blueprint\Framing\Sets\CompositionSet;

class ElvesKindred extends CompositionSet
{

    public function modify(AdvancedEntityInterface $entity):void
    {
        $entity->atr()->modWisdom(1);
        $entity->atr()->modStrength(-1);
//        $entity->skills()->add(DetectPoisonBonus);
    }
}
