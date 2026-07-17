<?php

namespace Modules\Blueprint\Taxonomies\Kindreds;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;
use Modules\Blueprint\Framing\Sets\Compositions\AbstractCompositionSet;

class ElvesKindred extends AbstractCompositionSet
{

    public function modify(AnimusEntityInterface $entity):void
    {
        $entity->animus()
            ->modWS(1)
            ->modST(-1);
//        $entity->skills()->add(DetectPoisonBonus::Alias);
    }
}
