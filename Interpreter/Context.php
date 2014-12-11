<?php
namespace DoYouPhp\PhpDesignPattern\Interpreter;

class Context
{
    private $commands;
    private $current_index = 0;
    private $max_index = 0;
    public function __construct($command)
    {
        $this->commands = preg_split('/ +/', trim($command));
        $this->max_index = count($this->commands);
    }

    public function next()
    {
        $this->current_index++;

        return $this;
    }

    public function getCurrentCommand()
    {
        if (!array_key_exists($this->current_index, $this->commands)) {
            return;
        }

        return trim($this->commands[$this->current_index]);
    }
}
