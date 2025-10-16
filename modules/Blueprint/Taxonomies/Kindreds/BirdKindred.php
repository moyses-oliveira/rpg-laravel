<?php

namespace Modules\Blueprint\Taxonomies\Kindreds;

use Modules\Blueprint\Framing\Entities\AdvancedEntityInterface;
use Modules\Blueprint\Framing\Sets\CompositionSet;

class BirdKindred extends CompositionSet
{

    public function modify(AdvancedEntityInterface $entity):void
    {
        $entity->atr()->modStrength(-3);
        $entity->atr()->modDexterity(+3);
        #$entity->skills()->add(Fly);
    }
}
