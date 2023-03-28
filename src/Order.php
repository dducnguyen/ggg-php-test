<?php

namespace App;

use App\Item;

class Order
{

    protected $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function setItems($items)
    {
        $this->items = array_map(function($item) {
            return new Item($item);
        }, $items);
    }

    public function calcGrossPrice()
    {
        $result = 0;

        foreach ($this->items as $item) {
            $result += $item->calcItemPrice();
        }

        return $result;
    }
}