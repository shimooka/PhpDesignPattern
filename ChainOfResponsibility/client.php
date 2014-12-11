<?php
namespace DoYouPhp\PhpDesignPattern\ChainOfResponsibility;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\ChainOfResponsibility\ConcreteHandler\MaxLengthValidationHandler;
use DoYouPhp\PhpDesignPattern\ChainOfResponsibility\ConcreteHandler\NotNullValidationHandler;

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
        $handler->setHandler(new ConcreteHandler\AlphabetValidationHandler());
        break;
    case 2:
        $handler->setHandler(new ConcreteHandler\NumberValidationHandler());
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
