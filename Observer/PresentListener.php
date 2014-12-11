<?php
namespace DoYouPhp\PhpDesignPattern\Observer;

use DoYouPhp\PhpDesignPattern\Observer\CartListener;


/**
 * ConcreteObserverクラスに相当する
 */
class PresentListener implements CartListener
{
    private static $PRESENT_TARGET_ITEM = '30:クッキーセット';
    private static $PRESENT_ITEM = '99:プレゼント';

    public function __construct()
    {
    }

    public function update(Cart $cart)
    {
        if ($cart->hasItem(self::$PRESENT_TARGET_ITEM) &&
            !$cart->hasItem(self::$PRESENT_ITEM)) {
            $cart->addItem(self::$PRESENT_ITEM);
        }
        if (!$cart->hasItem(self::$PRESENT_TARGET_ITEM) &&
            $cart->hasItem(self::$PRESENT_ITEM)) {
            $cart->removeItem(self::$PRESENT_ITEM);
        }
    }
}
