<?php
namespace DoYouPhp\PhpDesignPattern\Prototype\ConcretePrototype;

use DoYouPhp\PhpDesignPattern\Prototype\Prototype\ItemPrototype;

/**
 * ConcretePrototypeクラスに相当する
 */
class ItemB extends ItemPrototype
{
    /**
     * 深いコピーを行う必要がないので、空の実装を行う
     */
    protected function __clone()
    {
    }

    public function dumpData()
    {
        echo $this->getName().PHP_EOL;
        echo '商品番号：'.$this->getCode().PHP_EOL;
        echo '\\'.number_format($this->getPrice()).PHP_EOL;
    }
}
