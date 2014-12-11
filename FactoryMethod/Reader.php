<?php
namespace DoYouPhp\PhpDesignPattern\FactoryMethod;

/**
 * 読み込み機能を表すインターフェースクラス
 */
interface Reader
{
    public function read();
    public function display();
}
