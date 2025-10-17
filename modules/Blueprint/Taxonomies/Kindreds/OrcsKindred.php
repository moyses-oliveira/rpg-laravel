<?php

namespace Modules\Blueprint\Taxonomies\Kindreds;

use Modules\Blueprint\Framing\Entities\AdvancedEntityInterface;
use Modules\Blueprint\Framing\Sets\CompositionSet;

class OrcsKindred extends CompositionSet
{

    public function modify(AdvancedEntityInterface $entity):void
    {
        $entity->atr()
            ->modConstitution(1)
            ->modIntelligence(-1);
    }
}
