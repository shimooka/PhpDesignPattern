<?php
namespace DoYouPhp\PhpDesignPattern\Bridge\ConcreteImplementor;

use DoYouPhp\PhpDesignPattern\Bridge\Implementor\DataSource;


class FileDataSource implements DataSource
{
    /**
     * ソース名
     */
    private $source_name;

    /**
     * ファイルハンドラ
     */
    private $handler;

    /**
     * コンストラクタ
     * @param $source_name ファイル名
     */
    public function __construct($source_name)
    {
        $this->source_name = $source_name;
    }

    /**
     * データソースを開く
     * @throws \Exception
     */
    public function open()
    {
        if (!is_readable($this->source_name)) {
            throw new \Exception('データソースが見つかりません');
        }
        $this->handler = fopen($this->source_name, 'r');
        if (!$this->handler) {
            throw new \Exception('データソースのオープンに失敗しました');
        }
    }

    /**
     * データソースからデータを取得する
     * @return string データ文字列
     */
    public function read()
    {
        $buffer = array();
        while (!feof($this->handler)) {
            $buffer[] = fgets($this->handler);
        }

        return trim(implode($buffer));
    }

    /**
     * データソースを閉じる
     */
    public function close()
    {
        if (!is_null($this->handler)) {
            fclose($this->handler);
        }
    }
}
