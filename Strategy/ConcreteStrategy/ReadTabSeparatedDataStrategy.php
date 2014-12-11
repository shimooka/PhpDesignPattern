<?php
namespace DoYouPhp\PhpDesignPattern\Strategy\ConcreteStrategy;

use DoYouPhp\PhpDesignPattern\Strategy\Strategy\ReadItemDataStrategy;

/**
 * タブ区切りデータを読み込む
 * ConcreteStrategyに相当する
 */
class ReadTabSeparatedDataStrategy extends ReadItemDataStrategy
{
    /**
     * データファイルを読み込み、オブジェクトの配列で返す
     * @param string データファイル名
     * @return データオブジェクトの配列
     */
    protected function readData($filename)
    {
        $fp = fopen($filename, 'r');

        /**
         * ヘッダ行を抜く
         */
        $dummy = fgets($fp, 4096);

        /**
         * データの読み込み
         */
        $return_value = array();
        while (($buffer = fgets($fp, 4096)) !== false) {
            $data = explode("\t", trim($buffer));
            if (count($data) !== 4) {
                continue;
            }
            list($item_id, $item_name, $price, $release_date) = $data;

            /**
             * 戻り値のオブジェクトの作成
             */
            $obj = new \stdClass();
            $obj->item_name = $item_name;
            $obj->item_id = $item_id;
            $obj->price = $price;
            $obj->release_date = new \DateTime($release_date);

            $return_value[] = $obj;
        }

        fclose($fp);

        return $return_value;
    }
}
