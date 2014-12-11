<?php
namespace DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct;

use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct\OrderDao;
use DoYouPhp\PhpDesignPattern\AbstractFactory\Model\Item;
use DoYouPhp\PhpDesignPattern\AbstractFactory\Model\Order;

class MockOrderDao implements OrderDao
{
    public function findById($order_id)
    {
        $order = new Order('999');
        $order->addItem(new Item('99', 'ダミー商品'));
        $order->addItem(new Item('99', 'ダミー商品'));
        $order->addItem(new Item('98', 'テスト商品'));

        return $order;
    }
}
