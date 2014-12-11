<?php
namespace DoYouPhp\PhpDesignPattern\Strategy\Strategy;

/**
 * Strategyに相当する
 */
abstract class ReadItemDataStrategy
{
    private $filename;

    /**
     * コンストラクタ
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * データファイルを読み込み、オブジェクトの配列で返す
     * Contextに提供するメソッド
     * @param string データファイル名
     * @return データオブジェクトの配列
     */
    public function getData()
    {
        if (!is_readable($this->getFilename())) {
            throw new \Exception('file ['.$this->getFilename().'] is not readable !');
        }

        return $this->readData($this->getFilename());
    }

    /**
     * ファイル名を返す
     * @return ファイル名
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * ConcreteStrategyクラスに実装させるメソッド
     * @param string データファイル名
     * @return データオブジェクトの配列
     */
    abstract protected function readData($filename);
}
