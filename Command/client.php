<?php
namespace DoYouPhp\PhpDesignPattern\Command;

require dirname(__DIR__).'/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Command\Invoker\Queue;
use DoYouPhp\PhpDesignPattern\Command\ConcreteCommand\TouchCommand;
use DoYouPhp\PhpDesignPattern\Command\ConcreteCommand\CompressCommand;
use DoYouPhp\PhpDesignPattern\Command\ConcreteCommand\CopyCommand;
use DoYouPhp\PhpDesignPattern\Command\Receiver\File;

$queue = new Queue();
$file = new File("sample.txt");
$queue->addCommand(new TouchCommand($file));
$queue->addCommand(new CompressCommand($file));
$queue->addCommand(new CopyCommand($file));

$queue->run();
