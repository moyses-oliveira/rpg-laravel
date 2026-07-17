<?php
namespace Modules\Blueprint\Skills\Contracts;

use Modules\Blueprint\Framing\Entities\InteractiveEntityInterface;
use Modules\Blueprint\Framing\Sets\Contracts\ItemSetInterface;

interface SkillInterface extends ItemSetInterface
{

    /**
     * @param InteractiveEntityInterface $entity
     * @param array $targets
     * @return void
     */
    public function apply(InteractiveEntityInterface $entity, array $targets = []):void;

}
