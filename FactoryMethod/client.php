<?php
namespace DoYouPhp\PhpDesignPattern\FactoryMethod;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\FactoryMethod\ReaderFactory;

function show($filename) {
    echo $filename . PHP_EOL;

    $factory = new ReaderFactory();
    $data = $factory->create($filename);
    $data->read();
    $data->display();
}

/**
 * 入力ファイル
 */
show(__DIR__ . '/music.txt');
show(__DIR__ . '/music.xml');
