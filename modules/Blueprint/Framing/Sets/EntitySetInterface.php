<?php

namespace Modules\Blueprint\Framing\Sets;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;

interface EntitySetInterface
{
    public function modify(AnimusEntityInterface $entity):void;
}
