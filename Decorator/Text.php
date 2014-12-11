<?php
namespace DoYouPhp\PhpDesignPattern\Decorator;

/**
 * テキストを扱うインターフェースクラスです
 */
interface Text
{
    public function getText();
    public function setText($str);
}
