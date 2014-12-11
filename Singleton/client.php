<?php
namespace DoYouPhp\PhpDesignPattern\Singleton;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Singleton\SingletonSample;


/**
 * インスタンスを2つ取得する
 */
$instance1 = SingletonSample::getInstance();
$instance2 = SingletonSample::getInstance();

echo '<hr>';

/**
 * 2つのインスタンスが同一IDかどうかを確認する
 */
echo 'instance ID : '.$instance1->getID().PHP_EOL;
echo '$instance1->getID() === $instance2->getID() : '.($instance1->getID() === $instance2->getID() ? 'true' : 'false');
echo PHP_EOL;

/**
 * 2つのインスタンスが同一かどうかを確認する
 */
echo '$instance1 === $instance2 : '.($instance1 === $instance2 ? 'true' : 'false');
echo PHP_EOL;

/**
 * 複製できないことを確認する
 */
try {
    $instance1_clone = clone $instance1;
} catch (\RuntimeException $e) {
    echo $e->getMessage() . PHP_EOL;
}
