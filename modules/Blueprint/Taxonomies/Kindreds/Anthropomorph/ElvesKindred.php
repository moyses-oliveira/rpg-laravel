<?php

namespace Modules\Blueprint\Taxonomies\Kindreds\Anthropomorph;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;
use Modules\Blueprint\Framing\Sets\CompositionSet;

class ElvesKindred extends CompositionSet
{

    public function modify(AnimusEntityInterface $entity):void
    {
        $entity->animus()
            ->modWS(1)
            ->modST(-1);
//        $entity->skills()->add(DetectPoisonBonus::Alias);
    }
}
