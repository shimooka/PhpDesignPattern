<?php
namespace DoYouPhp\PhpDesignPattern\Observer;

use DoYouPhp\PhpDesignPattern\Observer\CartListener;


/**
 * ConcreteObserverクラスに相当する
 */
class LoggingListener implements CartListener {

    public function __construct() {
    }

    public function update(Cart $cart) {
        echo '<pre>';
        var_dump($cart->getItems());
        echo '</pre>';
    }
}
