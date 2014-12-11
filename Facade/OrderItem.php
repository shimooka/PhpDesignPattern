<?php
namespace DoYouPhp\PhpDesignPattern\Facade;

use DoYouPhp\PhpDesignPattern\Facade\Item;


class OrderItem
{
    private $item;
    private $amount;
    public function __construct(Item $item, $amount)
    {
        $this->item = $item;
        $this->amount = $amount;
    }
    public function getItem()
    {
        return $this->item;
    }
    public function getAmount()
    {
        return $this->amount;
    }
}
