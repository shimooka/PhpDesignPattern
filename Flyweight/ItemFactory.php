<?php
namespace DoYouPhp\PhpDesignPattern\Flyweight;

use DoYouPhp\PhpDesignPattern\Flyweight\Item;


/**
 * FlyweightFactoryに相当する
 * また、Singletonパターンにもなっている
 *
 * なお、このサンプルではUnsharedConcreteFlyweightオブジェクトを
 * 返すメソッドは用意されていない
 */
class ItemFactory
{
    private $pool;
    private static $instance = null;

    /**
     * コンストラクタ
     * このサンプルでは、インスタンス生成時に保持するオブジェクトを
     * すべて生成している
     */
    private function __construct($filename)
    {
        $this->buildPool($filename);
    }

    /**
     * Factoryのインスタンスを返す
     */
    public static function getInstance($filename)
    {
        if (is_null(self::$instance)) {
            self::$instance = new ItemFactory($filename);
        }

        return self::$instance;
    }

    /**
     * ConcreteFlyweightを返す
     */
    public function getItem($code)
    {
        if (array_key_exists($code, $this->pool)) {
            return $this->pool[$code];
        } else {
            return null;
        }
    }

    /**
     * データを読み込み、プールを初期化する
     */
    private function buildPool($filename)
    {
        $this->pool = array();

        $fp = fopen($filename, 'r');
        while (($buffer = fgets($fp, 4096)) !== false) {
            $data = explode("\t", trim($buffer));
            if (count($data) !== 3) {
                continue;
            }
            list($item_code, $item_name, $price) = $data;

            $this->pool[$item_code] = new Item($item_code, $item_name, $price);
        }
        fclose($fp);
    }

    /**
     * このインスタンスの複製を許可しないようにする
     * @throws \RuntimeException
     */
    final public function __clone()
    {
        throw new \RuntimeException('Clone is not allowed against '.get_class($this));
    }
}
