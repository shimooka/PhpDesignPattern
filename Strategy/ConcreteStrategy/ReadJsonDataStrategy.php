<?php
namespace DoYouPhp\PhpDesignPattern\Strategy\ConcreteStrategy;

use DoYouPhp\PhpDesignPattern\Strategy\Strategy\ReadItemDataStrategy;

/**
 * JSONデータを読み込む
 * ConcreteStrategyに相当する
 */
class ReadJsonDataStrategy extends ReadItemDataStrategy
{
    /**
     * データファイルを読み込み、オブジェクトの配列で返す
     * @param string データファイル名
     * @return データオブジェクトの配列
     */
    protected function readData($filename)
    {
        $data = json_decode(file_get_contents($filename));

        /**
         * データの読み込み
         */
        foreach ($data as $line) {
            /**
             * 戻り値のオブジェクトの作成
             */
            $obj = new \stdClass();
            $obj->item_name = $line->item_name;
            $obj->item_id = $line->item_id;
            $obj->price = $line->price;
            $obj->release_date = new \DateTime($line->release_date);

            $return_value[] = $obj;
        }

        return $return_value;
    }
}
