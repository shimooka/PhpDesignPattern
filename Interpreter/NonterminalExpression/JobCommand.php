<?php
namespace DoYouPhp\PhpDesignPattern\Interpreter\NonterminalExpression;

use DoYouPhp\PhpDesignPattern\Interpreter\AbstractExpression\Command;
use DoYouPhp\PhpDesignPattern\Interpreter\Context\Context;

class JobCommand implements Command
{
    public function execute(Context $context)
    {
        if ($context->getCurrentCommand() !== 'begin') {
            throw new \RuntimeException('illegal command '.$context->getCurrentCommand());
        }
        $command_list = new CommandListCommand();
        $command_list->execute($context->next());
    }
}
