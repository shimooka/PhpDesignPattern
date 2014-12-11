<?php
namespace DoYouPhp\PhpDesignPattern\Prototype;

use DoYouPhp\PhpDesignPattern\Prototype\ItemPrototype;


/**
 * ConcretePrototypeクラスに相当する
 */
class DeepCopyItem extends ItemPrototype
{
    /**
     * 深いコピーを行うための実装
     * 内部で保持しているオブジェクトもコピー
     */
    protected function __clone()
    {
        $this->setDetail(clone $this->getDetail());
    }
}
