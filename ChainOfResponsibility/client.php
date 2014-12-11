<?php
namespace DoYouPhp\PhpDesignPattern\ChainOfResponsibility;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\ChainOfResponsibility\MaxLengthValidationHandler;
use DoYouPhp\PhpDesignPattern\ChainOfResponsibility\NotNullValidationHandler;

function validate($input, $type)
{
    /**
     * チェーンの作成
     * typeの値によってチェーンを動的に変更
     */
    $handler = new NotNullValidationHandler();
    $handler->setHandler(new MaxLengthValidationHandler(8));

    switch ($type) {
    case 1:
        include_once 'AlphabetValidationHandler.php';
        $handler->setHandler(new AlphabetValidationHandler());
        break;
    case 2:
        include_once 'NumberValidationHandler.php';
        $handler->setHandler(new NumberValidationHandler());
        break;
    }

    return $handler->validate($input);
}


$result = validate('ChainOfResponsibility', 1);
echo ($result === false ? '検証できませんでした'
    : ((is_string($result) && $result !== '') ? $result : 'OK'))
    . PHP_EOL;

$result = validate('Chain of responsibility', 2);
echo ($result === false ? '検証できませんでした'
    : ((is_string($result) && $result !== '') ? $result : 'OK'))
    . PHP_EOL;
