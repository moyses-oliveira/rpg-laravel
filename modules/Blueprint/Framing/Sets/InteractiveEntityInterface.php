<?php

namespace Modules\Blueprint\Framing\Sets;

interface InteractiveEntityInterface
{
    public function setCompositionSet(EntitySetInterface $set):void;
    public function setConditionSet(ConditionSetInterface $set):void;

}
