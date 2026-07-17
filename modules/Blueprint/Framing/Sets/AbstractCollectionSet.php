<?php

namespace Modules\Blueprint\Framing\Sets;

use Modules\Blueprint\Framing\Sets\Contracts\CollectionSetInterface;
use Modules\Blueprint\Framing\Sets\Contracts\ItemSetInterface;

abstract class AbstractCollectionSet implements CollectionSetInterface
{
    protected array $_collection = [];

    public function add(ItemSetInterface $item):void
    {
        $this->_collection[$item->label()] = $item;
    }

    public function remove(string $label):void
    {
        unset($this->_collection[$label]);
    }
}
