<?php

namespace Modules\Blueprint\Taxonomies\Kindreds\Anthropomorph;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;
use Modules\Blueprint\Framing\Sets\CompositionSet;

class OrcsKindred extends CompositionSet
{

    public function modify(AnimusEntityInterface $entity):void
    {
        $entity->animus()
            ->modCT(1)
            ->modIQ(-1);
    }
}
