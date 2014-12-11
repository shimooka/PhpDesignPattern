<?php
namespace DoYouPhp\PhpDesignPattern\Visitor\Element;

use DoYouPhp\PhpDesignPattern\Visitor\Visitor\Visitor;

/**
 * Componentクラスに相当する
 */
abstract class OrganizationEntry
{
    private $code;
    private $name;

    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * 子要素を追加する
     * ここでは抽象メソッドとして用意
     */
    abstract public function add(OrganizationEntry $entry);

    /**
     * 子要素を取得する
     * ここでは抽象メソッドとして用意
     */
    abstract public function getChildren();

    /**
     * 組織ツリーを表示する
     * サンプルでは、デフォルトの実装を用意
     */
    public function accept(Visitor $visitor)
    {
        $visitor->visit($this);
    }
}
