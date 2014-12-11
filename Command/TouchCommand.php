<?php
namespace DoYouPhp\PhpDesignPattern\Command;

use DoYouPhp\PhpDesignPattern\Command\Command;
use DoYouPhp\PhpDesignPattern\Command\File;


/**
 * ConcreteCommandクラスに相当する
 */
class TouchCommand implements Command
{
    private $file;
    public function __construct(File $file)
    {
        $this->file = $file;
    }
    public function execute()
    {
        $this->file->create();
    }
}
