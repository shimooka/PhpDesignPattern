<?php
namespace DoYouPhp\PhpDesignPattern\Facade;

use DoYouPhp\PhpDesignPattern\Facade\Order;
use DoYouPhp\PhpDesignPattern\Facade\ItemDao;
use DoYouPhp\PhpDesignPattern\Facade\OrderDao;


class OrderManager
{
    public static function order(Order $order)
    {
        $item_dao = ItemDao::getInstance();
        foreach ($order->getItems() as $order_item) {
            $item_dao->setAside($order_item);
        }

        OrderDao::createOrder($order);
    }
}
