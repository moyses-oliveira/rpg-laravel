<?php

namespace Modules\Blueprint\Taxonomies\Kindreds;

use Modules\Blueprint\Framing\Entities\AdvancedEntityInterface;
use Modules\Blueprint\Framing\Sets\CompositionSet;

class DwarfKindred extends CompositionSet
{

    public function modify(AdvancedEntityInterface $entity): void
    {
        $entity->atr()
            ->modStrength(1)
            ->modDexterity(-1);
        $entity->skills()->add(EvaluateMineralsSkill::ALIAS);
    }
}
