<?php
namespace DoYouPhp\PhpDesignPattern\Observer;


/**
 * ConcreteObserverクラスに相当する
 */
class PresentListener implements CartListener
{
    const PRESENT_TARGET_ITEM = 'クッキーセット';
    const PRESENT_ITEM = 'プレゼント';

    public function __construct()
    {
    }

    public function update(Cart $cart)
    {
        if ($cart->hasItem(self::PRESENT_TARGET_ITEM) &&
            !$cart->hasItem(self::PRESENT_ITEM)) {
            $cart->addItem(self::PRESENT_ITEM);
        }
        if (!$cart->hasItem(self::PRESENT_TARGET_ITEM) &&
            $cart->hasItem(self::PRESENT_ITEM)) {
            $cart->removeItem(self::PRESENT_ITEM);
        }
    }
}
