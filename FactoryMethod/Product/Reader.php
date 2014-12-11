<?php
namespace DoYouPhp\PhpDesignPattern\FactoryMethod\Product;

/**
 * 読み込み機能を表すインターフェースクラス
 */
interface Reader
{
    public function read();
    public function display();
}
