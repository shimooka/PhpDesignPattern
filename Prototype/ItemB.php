<?php
namespace DoYouPhp\PhpDesignPattern\Prototype;

use DoYouPhp\PhpDesignPattern\Prototype\ItemPrototype;


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
        echo '<dl>';
        echo '<dt>'.$this->getName().'</dt>';
        echo '<dd>商品番号：'.$this->getCode().'</dd>';
        echo '<dd>\\'.number_format($this->getPrice()).'-</dd>';
        echo '</dl>';
    }
}
