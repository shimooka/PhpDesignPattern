<?php
namespace DoYouPhp\PhpDesignPattern\Interpreter;

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
