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

class AnimusEntity implements AnimusEntityInterface, HardEntityInterface, InteractiveEntityInterface
{
    public string $name;
    protected AnimusStats $_animus;
    protected ConsumableStat $_hp;
    protected MasterySet $_masteries;
    protected SkillSet $_skills;
    protected CompositionSet $_compositions;
    protected ConditionSet $_conditions;


    public function __construct()
    {
        $this->_animus = new AnimusStats();
        $this->_hp = new ConsumableStat(0,0);
    }

    public function hp(): ConsumableStat
    {
        return $this->_hp;
    }

    public function masteries(): MasterySet
    {
        return $this->_masteries;
    }

    public function skills(): SkillSet
    {
        return $this->_skills;
    }

    public function animus(): AnimusStats
    {
        return $this->_animus;
    }

    public function compositions(): CompositionSet
    {
        return $this->_compositions;

    }

    public function conditions(): ConditionSet
    {
        return $this->_conditions;
    }

    public function addMastery(ItemSetInterface $mastery):void
    {
        $this->masteries()->add($mastery);
    }

    public function addSkill(SkillInterface $skill):void
    {
        $this->skills()->add($skill);
    }

    public function addComposition(ItemSetInterface $composition):void
    {
        $this->compositions()->add($composition);
    }

    public function addCondition(ItemSetInterface $condition):void
    {
        $this->conditions()->add($condition);
    }

}
