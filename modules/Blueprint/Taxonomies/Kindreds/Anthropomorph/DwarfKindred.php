<?php

namespace Modules\Blueprint\Taxonomies\Kindreds\Anthropomorph;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;
use Modules\Blueprint\Framing\Sets\CompositionSet;
use Modules\Blueprint\Skills\EvaluateMineralsSkill;

class DwarfKindred extends CompositionSet
{

    public function modify(AnimusEntityInterface $entity): void
    {
        $entity->animus()
            ->modST(1)
            ->modDX(-1);
        $entity->skills()->add(EvaluateMineralsSkill::ALIAS);
    }
}
