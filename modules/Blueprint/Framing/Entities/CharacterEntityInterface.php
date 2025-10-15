<?php
namespace Modules\Blueprint\Framing\Entities;

use App\Blueprint\Framing\Sets\ProgressionSetInterface;

interface CharacterEntityInterface
{
    public function progressionTrigger(int $level):void;

    public function setProgressionSet(?ProgressionSetInterface $progressionSet): void;
}
