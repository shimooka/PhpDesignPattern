<?php
namespace DoYouPhp\PhpDesignPattern\Flyweight;

/**
 * FlyweightとConcreteFlyweightに相当する
 */
class Item
{
    private $code;
    private $name;
    private $price;

    public function __construct($code, $name, $price)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
