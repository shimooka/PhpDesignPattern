<?php
namespace DoYouPhp\PhpDesignPattern\AbstractFactory;

require __DIR__.'/../vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractFactory\DaoFactory;
use DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteFactory\DbFactory;
use DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteFactory\MockFactory;

function show(DaoFactory $factory)
{
    $item_id = 1;
    $item_dao = $factory->createItemDao();
    $item = $item_dao->findById($item_id);
    printf('ID=%sの商品は「%s」です。%s', $item_id, $item->getName(), PHP_EOL);

    $order_id = 3;
    $order_dao = $factory->createOrderDao();
    $order = $order_dao->findById($order_id);
    printf('ID=%sの注文情報は次の通りです。%s', $order_id, PHP_EOL);
    foreach ($order->getItems() as $item) {
        printf('%s%s', $item['object']->getName(), PHP_EOL);
    }
}

show(new DbFactory());
show(new MockFactory());
