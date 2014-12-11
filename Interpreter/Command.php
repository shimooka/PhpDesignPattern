<?php
namespace DoYouPhp\PhpDesignPattern\Interpreter;

interface Command
{
    public function execute(Context $context);
}
