<?php
namespace DoYouPhp\PhpDesignPattern\Facade;

require dirname(__DIR__).'/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Facade\Subsystem\Order;
use DoYouPhp\PhpDesignPattern\Facade\Subsystem\OrderItem;
use DoYouPhp\PhpDesignPattern\Facade\Subsystem\ItemDao;
use DoYouPhp\PhpDesignPattern\Facade\Facade\OrderManager;

$order = new Order();
$item_dao = ItemDao::getInstance();

$order->addItem(new OrderItem($item_dao->findById(1), 2));
$order->addItem(new OrderItem($item_dao->findById(2), 1));
$order->addItem(new OrderItem($item_dao->findById(3), 3));

/**
 * 注文処理はこの1行だけ
 */
OrderManager::order($order);
