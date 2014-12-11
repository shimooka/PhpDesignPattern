<?php
namespace DoYouPhp\PhpDesignPattern\Decorator\ConcreteComponent;

use DoYouPhp\PhpDesignPattern\Decorator\Component\Text;

/**
 * 編集前のテキストを表すクラスです
 */
class PlainText implements Text
{
    /**
     * インスタンスが保持する文字列です
     */
    private $textString = null;

    /**
     * インスタンスが保持する文字列を返します
     */
    public function getText()
    {
        return $this->textString;
    }

    /**
     * インスタンスに文字列をセットします
     */
    public function setText($str)
    {
        $this->textString = $str;
    }
}
