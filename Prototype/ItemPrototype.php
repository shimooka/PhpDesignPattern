<?php
namespace DoYouPhp\PhpDesignPattern\Prototype;

/**
 * Prototypeクラスに相当する
 */
abstract class ItemPrototype
{
    private $item_code;
    private $item_name;
    private $price;
    private $detail;

    public function __construct($code, $name, $price)
    {
        $this->item_code = $code;
        $this->item_name = $name;
        $this->price = $price;
    }

    public function getCode()
    {
        return $this->item_code;
    }

    public function getName()
    {
        return $this->item_name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setDetail(\stdClass $detail)
    {
        $this->detail = $detail;
    }

    public function getDetail()
    {
        return $this->detail;
    }

    public function dumpData()
    {
        echo '<dl>';
        echo '<dt>'.$this->getName().'</dt>';
        echo '<dd>商品番号：'.$this->getCode().'</dd>';
        echo '<dd>\\'.number_format($this->getPrice()).'-</dd>';
        echo '<dd>'.$this->detail->comment.'</dd>';
        echo '</dl>';
    }

    /**
     * cloneキーワードを使って新しいインスタンスを作成する
     */
    public function newInstance()
    {
        $new_instance = clone $this;

        return $new_instance;
    }

    /**
     * protectedメソッドにする事で、外部から直接cloneされない
     * ようにしている
     */
    abstract protected function __clone();
}
