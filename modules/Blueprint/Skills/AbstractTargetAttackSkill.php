<?php

namespace Modules\Blueprint\Skills;

use Modules\Blueprint\Framing\Entities\BoardAgentInterface;
use Modules\Blueprint\Framing\Entities\InteractiveEntityInterface;
use Modules\Blueprint\Framing\Stats\TargetAttackStat;
use Modules\Blueprint\Skills\Contracts\TargetAttackSkillInterface;

abstract class AbstractTargetAttackSkill extends AbstractSkill implements TargetAttackSkillInterface
{
    public function apply(InteractiveEntityInterface $entity, array $targets = []): void
    {
        if (count($targets) > 0) {
            throw new SkillUsageException('TargetAttackSkill is applied to the owner only.');
        }

        if (!$this->isBoardAgent($entity)) {
            throw new SkillUsageException('$entity must implement BoardAgentInterface.');
        }

        /** @var BoardAgentInterface $entity */
        $this->tune($entity->battle()->targetAttack());
    }
}
