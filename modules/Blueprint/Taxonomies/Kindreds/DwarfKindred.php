<?php

namespace Modules\Blueprint\Taxonomies\Kindreds;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;
use Modules\Blueprint\Framing\Sets\Compositions\AbstractCompositionSet;
use Modules\Blueprint\Skills\EvaluateMineralsSkill;

class DwarfKindred extends AbstractCompositionSet
{

    public function modify(AnimusEntityInterface $entity): void
    {
        $entity->animus()
            ->modST(1)
            ->modDX(-1);
        $entity->skills()->add(EvaluateMineralsSkill::ALIAS);
    }
}
