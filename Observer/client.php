<?php
namespace DoYouPhp\PhpDesignPattern\Observer;

require dirname(__DIR__).'/vendor/autoload.php';

/**
 * カートの作成
 */
$cart = new Cart();

/**
 * リスナーの登録
 */
$cart->addListener(new PresentListener());
$cart->addListener(new LoggingListener());

/**
 * 商品を追加してみる
 */
$cart->addItem("Tシャツ");
$cart->addItem("ぬいぐるみ");
$cart->addItem("ぬいぐるみ");
$cart->show();

/**
 * プレゼント対象の商品を追加してみる
 */
$cart->addItem("クッキーセット");
$cart->show();

/**
 * プレゼント対象の商品を削除してみる
 */
$cart->removeItem("クッキーセット");
$cart->show();
