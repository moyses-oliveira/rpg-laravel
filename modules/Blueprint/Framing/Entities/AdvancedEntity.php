<?php
namespace Modules\Blueprint\Framing\Entities;

use App\Blueprint\Framing\Sets\CompositionSetInterface;
use App\Blueprint\Framing\Sets\ConditionSetInterface;
use App\Blueprint\Framing\Stats\AdvancedEntityAttributesStats;
use App\Blueprint\Framing\Stats\HPEntityAttributesStats;
use App\Blueprint\Framing\Stats\SkillEntityStats;

class AdvancedEntity implements AdvancedEntityInterface, HardEntityInterface
{
    private AdvancedEntityAttributesStats $attributes;
    private HPEntityAttributesStats $hp;

    private SkillEntityStats $skills;

    /** @var CompositionSetInterface[]  */
    private array $compositionSetCollection = [];

    /** @var ConditionSetInterface[] */
    private array $conditionSetCollection = [];


    public function __construct()
    {
        $this->attributes = new AdvancedEntityAttributesStats();
        $this->hp = new HPEntityAttributesStats();
    }

    public function getHp(): HPEntityAttributesStats
    {
        return $this->hp;
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
