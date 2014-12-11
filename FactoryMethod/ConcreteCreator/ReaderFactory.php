<?php
namespace DoYouPhp\PhpDesignPattern\FactoryMethod\ConcreteCreator;

use DoYouPhp\PhpDesignPattern\FactoryMethod\Producr\Reader;
use DoYouPhp\PhpDesignPattern\FactoryMethod\ConcreteProduct\TextFileReader;
use DoYouPhp\PhpDesignPattern\FactoryMethod\ConcreteProduct\XMLFileReader;

/**
 * Readerクラスのインスタンス生成を行うクラス
 */
class ReaderFactory
{
    /**
     * Readerクラスのインスタンスを生成する
     */
    public function create($filename)
    {
        $reader = $this->createReader($filename);

        return $reader;
    }

    /**
     * Readerクラスのサブクラスを条件判定し、生成する
     */
    private function createReader($filename)
    {
        $postxt = stripos($filename, '.txt');
        $posxml = stripos($filename, '.xml');

        if ($postxt !== false) {
            $r = new TextFileReader($filename);

            return $r;
        } elseif ($posxml !== false) {
            return new XMLFileReader($filename);
        } else {
            die('This filename is not supported : '.$filename);
        }
    }
}
