<?php
namespace DoYouPhp\PhpDesignPattern\Prototype\ConcretePrototype;

use DoYouPhp\PhpDesignPattern\Prototype\Prototype\ItemPrototype;

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
        echo $this->getName().PHP_EOL;
        echo '商品番号：'.$this->getCode().PHP_EOL;
        echo '\\'.number_format($this->getPrice()).PHP_EOL;
        echo $this->detail->comment.PHP_EOL;
        echo $this->detail->create_date.PHP_EOL;
    }
}
