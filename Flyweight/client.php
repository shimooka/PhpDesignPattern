<?php
namespace DoYouPhp\PhpDesignPattern\Flyweight;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Flyweight\FlyweightFactory\ItemFactory;


function dumpData($data)
{
    foreach ($data as $object) {
        echo $object->getName() . PHP_EOL;
        echo '-->商品番号：'.$object->getCode().PHP_EOL;
        echo '-->\\'.number_format($object->getPrice()).PHP_EOL;
    }
}


$factory = ItemFactory::getInstance(__DIR__ . '/data.txt');

/**
 * データを取得する
 */
$items = array();
$items[] = $factory->getItem('ABC0001');
$items[] = $factory->getItem('ABC0002');
$items[] = $factory->getItem('ABC0003');

if ($items[0] === $factory->getItem('ABC0001')) {
    echo '同一のオブジェクトです';
} else {
    echo '同一のオブジェクトではありません';
}
echo PHP_EOL;

dumpData($items);
