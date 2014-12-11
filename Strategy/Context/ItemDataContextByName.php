<?php
namespace DoYouPhp\PhpDesignPattern\Strategy\Context;

/**
 * Contextに相当する
 */
class ItemDataContextByName
{
    private $strategy;

    /**
     * コンストラクタ
     * @param string ConcreteStrategyに相当するクラス名
     */
    public function __construct($strategy_name)
    {
        $concrete_strategy_name = $strategy_name.'.php';
        if (!is_readable($concrete_strategy_name)) {
            throw new \Exception($concrete_strategy_name.' is not readable !');
        }
        include_once $concrete_strategy_name;
        if (!class_exists($strategy_name)) {
            throw new \Exception($strategy_name.' dose not exists !');
        }
        $this->strategy = new $strategy_name();
    }

    /**
     * 商品情報をオブジェクトの配列で返す
     * @return データオブジェクトの配列
     */
    public function getItemData($filename)
    {
        return $this->strategy->getData($filename);
    }
}
