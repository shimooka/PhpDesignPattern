<?php
namespace DoYouPhp\PhpDesignPattern\Decorator\Component;

/**
 * テキストを扱うインターフェースクラスです
 */
interface Text
{
    public function getText();
    public function setText($str);
}
