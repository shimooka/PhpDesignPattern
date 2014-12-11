<?php
namespace DoYouPhp\PhpDesignPattern\Command;

/**
 * Receiverクラスに相当する
 */
class File
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function decompress()
    {
        echo $this->name.'を展開しました' . PHP_EOL;
    }
    public function compress()
    {
        echo $this->name.'を圧縮しました' . PHP_EOL;
    }
    public function create()
    {
        echo $this->name.'を作成しました' . PHP_EOL;
    }
}
