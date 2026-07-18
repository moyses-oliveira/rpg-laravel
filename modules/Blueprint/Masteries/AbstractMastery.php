<?php

namespace Modules\Blueprint\Masteries;

use Modules\Blueprint\Framing\Entities\AnimusEntity;

abstract class AbstractMastery
{
    protected int $level;

    protected AnimusEntity $entity;

    public function __construct(AnimusEntity $entity, int $level)
    {
        $this->level = $level;
        $this->entity = $entity;
    }

    abstract public function apply():void;

    public static function upgrade(AnimusEntity $entity, int $level):void
    {
        (new static($entity, $level))->apply();
    }
}
