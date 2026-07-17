<?php

namespace Modules\Blueprint\Taxonomies\Kindreds;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;
use Modules\Blueprint\Framing\Sets\Compositions\AbstractCompositionSet;

class OrcsKindred extends AbstractCompositionSet
{

    public function modify(AnimusEntityInterface $entity):void
    {
        $entity->animus()
            ->modCT(1)
            ->modIQ(-1);
    }
}
