<?php
namespace DoYouPhp\PhpDesignPattern\Bridge;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Bridge\Abstraction\Listing;
use DoYouPhp\PhpDesignPattern\Bridge\RefinedAbstraction\ExtendedListing;
use DoYouPhp\PhpDesignPattern\Bridge\ConcreteImplementor\FileDataSource;


/**
 * データを読み込むDataSourceを準備する
 */
$source = new FileDataSource(__DIR__ . '/data.txt');

/**
 * Listingクラスを使ってデータを表示する
 */
echo '■Listingクラス' . PHP_EOL;
$list = new Listing($source);
$list->open();
$data = $list->read();
echo $data . PHP_EOL;
$list->close();

/**
 * ExtendedListingクラスを使ってデータを表示する
 */
echo '■ExtendedListingクラス' . PHP_EOL;
$list = new ExtendedListing($source);
$list->open();
$data = $list->readWithEncode();
echo $data . PHP_EOL;
$list->close();
