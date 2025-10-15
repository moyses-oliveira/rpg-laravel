<?php

namespace Modules\Blueprint\Framing\Sets;

use App\Blueprint\Framing\Entities\AdvancedEntityInterface;

interface EntitySetInterface
{
    public function modify(AdvancedEntityInterface $entity):void;
}
