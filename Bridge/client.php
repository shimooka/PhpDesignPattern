<?php
namespace DoYouPhp\PhpDesignPattern\Bridge;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Bridge\Listing;
use DoYouPhp\PhpDesignPattern\Bridge\ExtendedListing;
use DoYouPhp\PhpDesignPattern\Bridge\FileDataSource;


/**
 * Listingクラス、ExtendedListingクラスをインスタンス化する。
 * 具体的な処理クラスとして、FileDataSourceクラスを使う。
 * データファイルは、data.txt
 */
$list1 = new Listing(new FileDataSource(__DIR__ . '/data.txt'));
$list2 = new ExtendedListing(new FileDataSource(__DIR__ . '/data.txt'));

try {
    $list1->open();
    $list2->open();
} catch (\Exception $e) {
    die($e->getMessage() . PHP_EOL);
}

/**
 * 取得したデータの表示（readメソッド）
 */
$data = $list1->read();
echo $data . PHP_EOL;

/**
 * 取得したデータの表示（readWithEncodeメソッド）
 */
$data = $list2->readWithEncode();
echo $data . PHP_EOL;

$list1->close();
$list2->close();
