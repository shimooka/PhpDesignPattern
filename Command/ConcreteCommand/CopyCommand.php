<?php
namespace DoYouPhp\PhpDesignPattern\Command\ConcreteCommand;

use DoYouPhp\PhpDesignPattern\Command\Command\Command;
use DoYouPhp\PhpDesignPattern\Command\Receiver\File;


/**
 * ConcreteCommandクラスに相当する
 */
class CopyCommand implements Command
{
    private $file;
    public function __construct(File $file)
    {
        $this->file = $file;
    }
    public function execute()
    {
        $file = new File('copy_of_'.$this->file->getName());
        $file->create();
    }
}
