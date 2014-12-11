<?php
namespace DoYouPhp\PhpDesignPattern\Strategy;

/**
 * Contextに相当する
 */
class ItemDataContext
{
    private $strategy;

    /**
     * コンストラクタ
     * @param ReadItemDataStrategy ReadItemDataStrategyオブジェクト
     */
    public function __construct(ReadItemDataStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * 商品情報をオブジェクトの配列で返す
     * @return データオブジェクトの配列
     */
    public function getItemData()
    {
        return $this->strategy->getData();
    }
}
