<?php

namespace Modules\Blueprint\Framing\Sets;

use Modules\Blueprint\Framing\Entities\AnimusEntityInterface;

interface ProgressionSetInterface extends EntitySetInterface
{

    public function apply(AnimusEntityInterface $entity, int $level):void;

}
