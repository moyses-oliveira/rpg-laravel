<?php

namespace Modules\Blueprint\Framing\Sets\Contracts;

interface CollectionSetInterface
{
    public function add(ItemSetInterface $item):void;
    public function remove(string $label):void;
}
