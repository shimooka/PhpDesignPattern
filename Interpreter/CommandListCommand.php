<?php
namespace DoYouPhp\PhpDesignPattern\Interpreter;

class CommandListCommand implements Command
{
    public function execute(Context $context)
    {
        while (true) {
            $current_command = $context->getCurrentCommand();
            if (is_null($current_command)) {
                throw new \RuntimeException('"end" not found ');
            } elseif ($current_command === 'end') {
                break;
            } else {
                $command = new CommandCommand();
                $command->execute($context);
            }
            $context->next();
        }
    }
}
