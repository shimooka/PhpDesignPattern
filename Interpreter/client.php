<?php
namespace DoYouPhp\PhpDesignPattern\Interpreter;

require dirname(__DIR__).'/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Interpreter\Context\Context;
use DoYouPhp\PhpDesignPattern\Interpreter\AbstractExpression\Command;
use DoYouPhp\PhpDesignPattern\Interpreter\NonterminalExpression\JobCommand;

function execute($command)
{
    echo '■'.$command.PHP_EOL;

    $job = new JobCommand();
    try {
        $job->execute(new Context($command));
    } catch (\Exception $e) {
        echo $e->getMessage().PHP_EOL;
    }
}

execute('begin date end');
execute('begin date line diskspace end');
execute('begin diskspace date end');
