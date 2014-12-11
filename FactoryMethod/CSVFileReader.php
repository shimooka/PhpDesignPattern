<?php
namespace DoYouPhp\PhpDesignPattern\FactoryMethod;

use DoYouPhp\PhpDesignPattern\FactoryMethod\Reader;


/**
 * CSVファイルの読み込みを行うクラス
 */
class CSVFileReader implements Reader
{
    /**
     * 内容を表示するファイル名
     *
     * @access private
     */
    private $filename;

    /**
     * データを扱うハンドラ名
     *
     * @access private
     */
    private $handler;

    /**
     * コンストラクタ
     *
     * @param string ファイル名
     * @throws \Exception
     */
    public function __construct($filename)
    {
        if (!is_readable($filename)) {
            throw new \Exception('file ['.$filename.'] is not readable !');
        }
        $this->filename = $filename;
    }

    /**
     * 読み込みを行う
     */
    public function read()
    {
        $this->handler = fopen($this->filename, 'r');
    }

    /**
     * 文字コードの変換を行う
     */
    private function convert($str)
    {
        return mb_convert_encoding($str, mb_internal_encoding(), 'sjis-win');
    }

    /**
     * 表示を行う
     */
    public function display()
    {
        $prev_artist = null;
        $titles = [];

        /**
         * Linux環境の場合、事前に適宜setlocale関数を使用して
         * ロケールを設定してください
         * 例）setlocale(LC_ALL, 'ja_JP.sjis');
         */
        while ($data = fgetcsv($this->handler, 4096, ',')) {
            if (count($data) !== 2) {
                continue;
            }
            list($artist, $title) = $data;
            if ($artist !== $prev_artist) {
                $this->displayTitles($titles);

                $prev_artist = $artist;
                echo $this->convert($prev_artist) . PHP_EOL;
                $titles = [];
            }
            $titles[] = $title;
        }

        if (count($titles) > 0) {
            $this->displayTitles($titles);
        }

        fclose($this->handler);
    }

    private function displayTitles(array $titles = [])
    {
        printf('-->%s%s',
            $this->convert(implode(PHP_EOL . "-->", $titles)),
            count($titles) > 0 ? PHP_EOL : null);
    }
}
