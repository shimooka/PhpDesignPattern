<?php
namespace DoYouPhp\PhpDesignPattern\Observer;


/**
 * ConcreteObserverクラスに相当する
 */
class LoggingListener implements CartListener
{
    public function __construct()
    {
    }

    public function update(Cart $cart)
    {
        echo var_export($cart->getItems(), true).PHP_EOL;
    }
}
