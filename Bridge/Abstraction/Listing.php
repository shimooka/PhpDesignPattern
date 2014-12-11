<?php
namespace DoYouPhp\PhpDesignPattern\Bridge\Abstraction;

use DoYouPhp\PhpDesignPattern\Bridge\Implementor\DataSource;

class Listing
{
    private $data_source;

    /**
     * コンストラクタ
     * @param $source_name ファイル名
     */
    public function __construct(DataSource $data_source)
    {
        $this->data_source = $data_source;
    }

    /**
     * データソースを開く
     */
    public function open()
    {
        $this->data_source->open();
    }

    /**
     * データソースからデータを取得する
     * @return array データの配列
     */
    public function read()
    {
        return $this->data_source->read();
    }

    /**
     * データソースを閉じる
     */
    public function close()
    {
        $this->data_source->close();
    }
}
