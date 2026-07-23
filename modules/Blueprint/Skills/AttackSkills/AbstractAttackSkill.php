<?php

namespace Modules\Blueprint\Skills\AttackSkills;

use Modules\Blueprint\Framing\Entities\InteractiveEntityInterface;
use Modules\Blueprint\Framing\Stats\TargetAttackStat;
use Modules\Blueprint\Framing\Stats\TunesTargetAttackInterface;
use Modules\Blueprint\Skills\AbstractSkill;

abstract class AbstractAttackSkill extends AbstractSkill implements TunesTargetAttackInterface
{
    public function damage(): int { return 0; }

    public function tune(TargetAttackStat $stat): void {}

    public function apply(InteractiveEntityInterface $entity, array $targets = []): void {}
}
