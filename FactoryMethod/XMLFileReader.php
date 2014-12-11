<?php
namespace DoYouPhp\PhpDesignPattern\FactoryMethod;

use DoYouPhp\PhpDesignPattern\FactoryMethod\Reader;


/**
 * XMLファイルの読み込みを行うクラス
 */
class XMLFileReader implements Reader
{
    /**
     * 内容を表示するファイル名
     * @access private
     */
    private $filename;

    /**
     * データを扱うハンドラ名
     * @access private
     */
    private $handler;

    /**
     * コンストラクタ
     * @param string ファイル名
     * @throws \Exception
     */
    public function __construct($filename)
    {
        if (!is_readable($filename)) {
            throw new \Exception('file '.$filename.' is not readable !');
        }
        $this->filename = $filename;
    }

    /**
     * 読み込みを行う
     */
    public function read()
    {
        $this->handler = simplexml_load_file($this->filename);
    }

    /**
     * 表示を行う
     */
    public function display()
    {
        foreach ($this->handler->artist as $artist) {
            echo $artist['name'] . PHP_EOL;
            foreach ($artist->music as $music) {
                printf('-->%s%s', $music['name'], PHP_EOL);
            }
        }
    }
}
