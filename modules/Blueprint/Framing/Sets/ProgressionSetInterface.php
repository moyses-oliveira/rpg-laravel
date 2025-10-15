<?php

namespace Modules\Blueprint\Framing\Sets;

use App\Blueprint\Framing\Entities\AdvancedEntityInterface;

interface ProgressionSetInterface extends EntitySetInterface
{

    public function apply(AdvancedEntityInterface $entity, int $level):void;

}
