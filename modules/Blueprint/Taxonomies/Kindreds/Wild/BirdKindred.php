<?php

namespace Modules\Blueprint\Taxonomies\Kindreds\Wild;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;
use Modules\Blueprint\Framing\Sets\CompositionSet;

class BirdKindred extends CompositionSet
{

    public function modify(AnimusEntityInterface $entity):void
    {
        $entity->animus()
            ->modST(-20);
        $entity->animus()
            ->modDX(10);
    }
}
