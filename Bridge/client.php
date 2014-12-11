<?php
namespace DoYouPhp\PhpDesignPattern\Bridge;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Bridge\Abstraction\Listing;
use DoYouPhp\PhpDesignPattern\Bridge\RefinedAbstraction\ExtendedListing;
use DoYouPhp\PhpDesignPattern\Bridge\ConcreteImplementor\FileDataSource;


/**
 * Listingクラス、ExtendedListingクラスをインスタンス化する。
 * 具体的な処理クラスとして、FileDataSourceクラスを使う。
 * データファイルは、data.txt
 */
$source = new FileDataSource(__DIR__ . '/data.txt');

echo '■Listingクラス' . PHP_EOL;
$list = new Listing($source);
$list->open();
$data = $list->read();
echo $data . PHP_EOL;
$list->close();


echo '■ExtendedListingクラス' . PHP_EOL;
$list = new ExtendedListing($source);
$list->open();
$data = $list->readWithEncode();
echo $data . PHP_EOL;
$list->close();
