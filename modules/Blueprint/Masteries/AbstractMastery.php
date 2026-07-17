<?php

namespace Modules\Blueprint\Masteries;

use Modules\Blueprint\Framing\Entities\AnimusEntity;
use Modules\Blueprint\Framing\Sets\Contracts\ProgressionSetInterface;

class AbstractMastery
{
    public function upgrade(AnimusEntity $entity)
    {
        $entity->addSkill();
    }

    protected ?ProgressionSetInterface $progressionSet = null;

    public function progressionTrigger(int $level):void {
        $this->progressionSet->apply($this, $level);
    }

    public function setProgressionSet(?ProgressionSetInterface $progressionSet): void
    {
        $this->progressionSet = $progressionSet;
    }
}
