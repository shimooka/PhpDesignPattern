<?php
namespace DoYouPhp\PhpDesignPattern\Command;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Command\Queue;
use DoYouPhp\PhpDesignPattern\Command\TouchCommand;
use DoYouPhp\PhpDesignPattern\Command\CompressCommand;
use DoYouPhp\PhpDesignPattern\Command\CopyCommand;
use DoYouPhp\PhpDesignPattern\Command\File;


$queue = new Queue();
$file = new File("sample.txt");
$queue->addCommand(new TouchCommand($file));
$queue->addCommand(new CompressCommand($file));
$queue->addCommand(new CopyCommand($file));

$queue->run();
