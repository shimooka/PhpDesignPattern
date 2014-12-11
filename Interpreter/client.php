<?php
namespace DoYouPhp\PhpDesignPattern\Interpreter;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Interpreter\Context;
use DoYouPhp\PhpDesignPattern\Interpreter\Command;
use DoYouPhp\PhpDesignPattern\Interpreter\CommandCommand;
use DoYouPhp\PhpDesignPattern\Interpreter\CommandListCommand;
use DoYouPhp\PhpDesignPattern\Interpreter\JobCommand;

function execute($command)
{
    $job = new JobCommand();
    try {
        $job->execute(new Context($command));
    } catch (\Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}


execute('begin date end');
execute('begin date line diskspace end');
execute('begin diskspace date end');
