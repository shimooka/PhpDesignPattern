<?php
namespace DoYouPhp\PhpDesignPattern\Observer;

require dirname(__DIR__).'/vendor/autoload.php';



$cart = new Cart();
$cart->addListener(new PresentListener());
$cart->addListener(new LoggingListener());

$cart->addItem("Tシャツ");
$cart->addItem("ぬいぐるみ");
$cart->addItem("ぬいぐるみ");
$cart->show();

$cart->addItem("クッキーセット");
$cart->show();

$cart->removeItem("クッキーセット");
$cart->show();
