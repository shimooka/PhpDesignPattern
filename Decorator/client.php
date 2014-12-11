<?php
namespace DoYouPhp\PhpDesignPattern\Decorator;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Decorator\ConcreteDecorator\UpperCaseText;
use DoYouPhp\PhpDesignPattern\Decorator\ConcreteDecorator\DoubleByteText;
use DoYouPhp\PhpDesignPattern\Decorator\ConcreteComponent\PlainText;


function decorate($text, array $decorate = []) {
    $text_object = new PlainText();
    $text_object->setText($text);

    foreach ($decorate as $val) {
        switch ($val) {
        case 'double' :
            $text_object = new DoubleByteText($text_object);
            break;
        case 'upper':
            $text_object = new UpperCaseText($text_object);
            break;
        }
    }
    echo $text_object->getText() . PHP_EOL;
}

$text = 'Hello, Decorator Pattern !!';
decorate($text);
decorate($text, ['double']);
decorate($text, ['upper']);
decorate($text, ['double', 'upper']);
