<?php
namespace DoYouPhp\PhpDesignPattern\Interpreter\AbstractExpression;

use DoYouPhp\PhpDesignPattern\Interpreter\Context\Context;

interface Command
{
    public function execute(Context $context);
}
