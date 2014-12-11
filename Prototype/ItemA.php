<?php
namespace DoYouPhp\PhpDesignPattern\Prototype;

use DoYouPhp\PhpDesignPattern\Prototype\ItemPrototype;


/**
 * ConcretePrototypeクラスに相当する
 */
class ItemA extends ItemPrototype
{
    private $detail;

    public function setDetail(\stdClass $detail)
    {
        $this->detail = $detail;
    }

    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * 深いコピーを行うための実装
     * 内部で保持しているオブジェクトもコピー
     */
    protected function __clone()
    {
        $this->detail = clone $this->detail;
    }

    public function dumpData()
    {
        echo '<dl>';
        echo '<dt>'.$this->getName().'</dt>';
        echo '<dd>商品番号：'.$this->getCode().'</dd>';
        echo '<dd>\\'.number_format($this->getPrice()).'-</dd>';
        echo '<dd>'.$this->detail->comment.'</dd>';
        echo '<dd>'.$this->detail->create_date.'</dd>';
        echo '</dl>';
    }
}
