<?php

namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Sets\Compositions\CompositionSetInterface;
use Modules\Blueprint\Framing\Sets\Conditions\ConditionSetInterface;

interface AgentEntityInterface
{
    public function addComposition(CompositionSetInterface $set):void;
    public function addCondition(ConditionSetInterface $set):void;
    public function getCompositions(): array;
    public function getConditions(): array;

}
