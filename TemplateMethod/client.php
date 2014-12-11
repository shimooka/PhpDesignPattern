<?php
namespace DoYouPhp\PhpDesignPattern\TemplateMethod;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\TemplateMethod\ListDisplay;
use DoYouPhp\PhpDesignPattern\TemplateMethod\TableDisplay;


$data = array('Design Pattern',
              'Gang of Four',
              'Template Method Sample1',
              'Template Method Sample2', );

$display = new ListDisplay($data);
$display->display();

$display = new TableDisplay($data);
$display->display();
