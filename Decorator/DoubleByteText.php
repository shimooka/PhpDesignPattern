<?php
namespace DoYouPhp\PhpDesignPattern\Decorator;

use DoYouPhp\PhpDesignPattern\Decorator\TextDecorator;


/**
 * TextDecoratorクラスの実装クラスです
 */
class DoubleByteText extends TextDecorator
{
    /**
     * インスタンスを生成します
     */
    public function __construct(Text $target)
    {
        parent::__construct($target);
    }

    /**
     * テキストを全角文字に変換して返します
     * 半角英字、数字、スペース、カタカナを全角に、
     * 濁点付きの文字を一文字に変換します
     */
    public function getText()
    {
        $str = parent::getText();
        $str = mb_convert_kana($str, "RANSKV");

        return $str;
    }
}
