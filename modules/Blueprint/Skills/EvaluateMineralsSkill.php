<?php

namespace Modules\Blueprint\Skills;

use Modules\Blueprint\Framing\Entities\InteractiveEntityInterface;
use Modules\Blueprint\Framing\Stats\AnimusAttributeEnum;

class EvaluateMineralsSkill extends AbstractSkill
{

    public function apply(InteractiveEntityInterface $entity, array $targets = []):void
    {

    }

    public function label():string
    {
        return 'EVALUATE_MINERALS';
    }

    const ATTRIBUTE = AnimusAttributeEnum::IN;

}
