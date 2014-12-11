<?php
namespace DoYouPhp\PhpDesignPattern\Facade\Subsystem;

use DoYouPhp\PhpDesignPattern\Facade\Subsystem\Order;


class OrderDao
{
    public static function createOrder(Order $order)
    {
        echo '以下の内容で注文データを作成しました' . PHP_EOL;

        echo "商品番号\t"
            . "商品名\t"
            . "単価\t"
            . "数量\t"
            . "金額\t"
            . PHP_EOL;

        foreach ($order->getItems() as $order_item) {
            echo $order_item->getItem()->getId()."\t"
                . $order_item->getItem()->getName()."\t"
                . $order_item->getItem()->getPrice()."\t"
                . $order_item->getAmount()."\t"
                . ($order_item->getItem()->getPrice() * $order_item->getAmount())
                . PHP_EOL;
        }
    }
}
