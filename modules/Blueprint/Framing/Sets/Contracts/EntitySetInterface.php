<?php

namespace Modules\Blueprint\Framing\Sets\Contracts;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;

interface EntitySetInterface
{
    public function modify(AnimusEntityInterface $entity):void;
}
