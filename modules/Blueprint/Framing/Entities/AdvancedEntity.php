<?php
namespace Modules\Blueprint\Framing\Entities;

use Modules\Blueprint\Framing\Sets\CompositionSetInterface;
use Modules\Blueprint\Framing\Sets\ConditionSetInterface;
use Modules\Blueprint\Framing\Stats\AdvancedEntityAttributesStats;
use Modules\Blueprint\Framing\Stats\HPEntityAttributesStats;
use Modules\Blueprint\Framing\Stats\SkillEntityStats;

class AdvancedEntity implements AdvancedEntityInterface, HardEntityInterface
{
    private AdvancedEntityAttributesStats $attributes;
    private HPEntityAttributesStats $_hp;

    private SkillEntityStats $_skills;

    /** @var CompositionSetInterface[]  */
    private array $compositionSetCollection = [];

    /** @var ConditionSetInterface[] */
    private array $conditionSetCollection = [];


    public function __construct()
    {
        $this->attributes = new AdvancedEntityAttributesStats();
        $this->_hp = new HPEntityAttributesStats();
    }

    public function hp(): HPEntityAttributesStats
    {
        return $this->_hp;
    }

    public function skills(): SkillEntityStats
    {
        return $this->_skills;
    }

    public function atr(): AdvancedEntityAttributesStats
    {
        return $this->attributes;
    }

    public function addComposition(CompositionSetInterface $set):void
    {
        $this->compositionSetCollection[] = $set;
    }

    public function addCondition(ConditionSetInterface $set):void
    {
        $this->conditionSetCollection[] = $set;
    }

}
