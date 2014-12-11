<?php
namespace DoYouPhp\PhpDesignPattern\Facade\Facade;

use DoYouPhp\PhpDesignPattern\Facade\Subsystem\Order;
use DoYouPhp\PhpDesignPattern\Facade\Subsystem\ItemDao;
use DoYouPhp\PhpDesignPattern\Facade\Subsystem\OrderDao;

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
