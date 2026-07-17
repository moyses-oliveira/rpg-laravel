<?php

namespace Modules\Blueprint\Framing\Sets;

use Modules\Blueprint\Framing\Sets\Contracts\ItemSetInterface;
use Modules\Blueprint\Skills\Contracts\SkillInterface;

class MasterySet extends AbstractCollectionSet
{
    public function add(ItemSetInterface $item):void
    {
        if(!($item instanceof SkillInterface))
            throw new \InvalidArgumentException('MasterySet can only contain SkillInterface');

        $this->_collection[$item->label()] = $item;
    }
}
