<?php

namespace Modules\Blueprint\Taxonomies\Kindreds;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;
use Modules\Blueprint\Framing\Sets\Compositions\AbstractCompositionSet;

class BirdKindred extends AbstractCompositionSet
{

    public function modify(AnimusEntityInterface $entity):void
    {
        $entity->animus()
            ->modST(-3);
//        $entity->atr()->modDexterity(+3);
//        $entity->skills()->add(FlyNaturallySkill::ALIAS);
        #$entity->skills()->add(FlyNaturallySkill);
    }
}
