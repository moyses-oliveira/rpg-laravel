<?php
namespace Modules\Blueprint\Masteries;

use Modules\Blueprint\Framing\Sets\Contracts\ProgressionSetInterface;

interface MasteryEntityInterface
{
    public function progressionTrigger(int $level):void;

    public function setProgressionSet(?ProgressionSetInterface $progressionSet): void;

}
