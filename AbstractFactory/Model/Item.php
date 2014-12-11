<?php
namespace DoYouPhp\PhpDesignPattern\AbstractFactory\Model;

/**
 * 1つの商品を表すクラス
 */
class Item
{
    private $id;
    private $name;
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
}
