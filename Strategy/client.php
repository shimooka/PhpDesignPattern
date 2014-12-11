<?php
namespace DoYouPhp\PhpDesignPattern\Strategy;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Strategy\ItemDataContext;
use DoYouPhp\PhpDesignPattern\Strategy\ItemDataContextByName;
use DoYouPhp\PhpDesignPattern\Strategy\ReadFixedLengthDataStrategy;
use DoYouPhp\PhpDesignPattern\Strategy\ReadTabSeparatedDataStrategy;


function dumpData($data)
{
    foreach ($data as $object) {
        echo $object->item_name . PHP_EOL;
        echo '-->商品番号：'.$object->item_id . PHP_EOL;
        echo '-->\\'.number_format($object->price) . PHP_EOL;
        echo '-->'.$object->release_date->format('Y/m/d').'発売' . PHP_EOL;
    }
}


/**
 * タブ区切りデータを読み込む
 */
echo 'タブ区切りデータ' . PHP_EOL;
$strategy = new ReadTabSeparatedDataStrategy(__DIR__ . '/item_data.txt');
$context = new ItemDataContext($strategy);
dumpData($context->getItemData());

/**
 * JSONデータを読み込む
 */
echo 'JSONデータ' . PHP_EOL;
$strategy = new ReadJsonDataStrategy(__DIR__ . '/item_data.json');
$context = new ItemDataContext($strategy);
dumpData($context->getItemData());
