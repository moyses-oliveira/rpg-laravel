<?php
namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Sets\Compositions\CompositionSetInterface;
use Modules\Blueprint\Framing\Sets\Conditions\ConditionSetInterface;
use Modules\Blueprint\Framing\Stats\AnimusStats;
use Modules\Blueprint\Framing\Stats\ConsumableStat;
use Modules\Blueprint\Skills\Contracts\SkillInterface;

class AnimusEntity implements AnimusEntityInterface, HardEntityInterface, AgentEntityInterface, InteractiveEntityInterface
{
    private AnimusStats $_animus;
    private ConsumableStat $_hp;

    /** @var SkillInterface[]  */
    private array $_skills = [];

    /** @var CompositionSetInterface[]  */
    private array $compositions = [];

    /** @var ConditionSetInterface[] */
    private array $conditions = [];


    public function __construct()
    {
        $this->_animus = new AnimusStats();
        $this->_hp = new ConsumableStat(0,0);
    }

    public function hp(): ConsumableStat
    {
        return $this->_hp;
    }

    public function skills(): array
    {
        return $this->_skills;
    }

    public function animus(): AnimusStats
    {
        return $this->_animus;
    }

    public function addComposition(CompositionSetInterface $set):void
    {
        $this->compositions[] = $set;
    }

    public function addCondition(ConditionSetInterface $set):void
    {
        $this->conditions[] = $set;
    }

    public function getCompositions(): array
    {
        return $this->compositions;

    }

    public function getConditions(): array
    {
        return $this->conditions;
    }

}
