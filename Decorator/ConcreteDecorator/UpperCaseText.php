<?php
namespace DoYouPhp\PhpDesignPattern\Decorator\ConcreteDecorator;

use DoYouPhp\PhpDesignPattern\Decorator\Decorator\TextDecorator;
use DoYouPhp\PhpDesignPattern\Decorator\Component\Text;

/**
 * TextDecoratorクラスの実装クラスです
 */
class UpperCaseText extends TextDecorator
{
    /**
     * インスタンスを生成します
     */
    public function __construct(Text $target)
    {
        parent::__construct($target);
    }

    /**
     * 半角小文字を半角大文字に変換して返します
     */
    public function getText()
    {
        $str = parent::getText();
        $str = mb_strtoupper($str);

        return $str;
    }
}
