<?php
namespace Modules\Blueprint\Skills\Contracts;

use Modules\Blueprint\Framing\Entities\InteractiveEntityInterface;

interface SkillInterface
{

    /**
     * @param InteractiveEntityInterface $entity
     * @param array $targets
     * @return void
     */
    public function apply(InteractiveEntityInterface $entity, array $targets = []):void;

}
