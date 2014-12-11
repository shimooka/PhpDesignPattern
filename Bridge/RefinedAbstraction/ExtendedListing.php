<?php
namespace DoYouPhp\PhpDesignPattern\Bridge\RefinedAbstraction;

use DoYouPhp\PhpDesignPattern\Bridge\Abstraction\Listing;


/**
 * Listingクラスで提供されている機能を拡張する
 * RefinedAbstractionに相当する
 */
class ExtendedListing extends Listing
{
    /**
     * コンストラクタ
     * @param $source_name ファイル名
     */
    public function __construct($data_source)
    {
        parent::__construct($data_source);
    }

    /**
     * データを読み込む際、大文字に変換する
     * @return 変換されたデータ
     */
    public function readWithEncode()
    {
        return strtoupper($this->read());
    }
}
