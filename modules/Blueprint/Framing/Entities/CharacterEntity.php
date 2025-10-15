<?php
namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Sets\ProgressionSetInterface;

class CharacterEntity extends AdvancedEntity implements CharacterEntityInterface
{

    protected ?ProgressionSetInterface $progressionSet = null;

    public function progressionTrigger(int $level):void {
        $this->progressionSet->apply($this, $level);
    }

    public function setProgressionSet(?ProgressionSetInterface $progressionSet): void
    {
        $this->progressionSet = $progressionSet;
    }
}
