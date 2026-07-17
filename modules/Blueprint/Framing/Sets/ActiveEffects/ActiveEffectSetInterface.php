<?php

namespace Modules\Blueprint\Framing\Sets\ActiveEffects;

use Modules\Blueprint\Framing\Entities\BoardAgentInterface;
use Modules\Blueprint\Framing\Sets\EntitySetInterface;

interface ActiveEffectSetInterface extends EntitySetInterface
{

    public function expend():int;
    public function slots():int;
    public function label():string;

    public function apply(BoardAgentInterface $agent):void;

}
