<?php
namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Sets\CompositionSet;
use Modules\Blueprint\Framing\Sets\ConditionSet;
use Modules\Blueprint\Framing\Sets\Contracts\ItemSetInterface;
use Modules\Blueprint\Framing\Sets\MasterySet;
use Modules\Blueprint\Framing\Sets\SkillSet;
use Modules\Blueprint\Framing\Stats\AnimusStats;
use Modules\Blueprint\Framing\Stats\ConsumableStat;
use Modules\Blueprint\Skills\Contracts\SkillInterface;

interface AnimusEntityInterface
{
    public function animus(): AnimusStats;

    public function hp(): ConsumableStat;
    public function masteries(): MasterySet;
    public function skills(): SkillSet;
    public function compositions(): CompositionSet;
    public function conditions(): ConditionSet;

    public function addMastery(ItemSetInterface $mastery):void;
    public function addSkill(SkillInterface $skill):void;
    public function addComposition(ItemSetInterface $composition):void;
    public function addCondition(ItemSetInterface $condition):void;
}
