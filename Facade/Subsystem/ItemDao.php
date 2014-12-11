<?php
namespace DoYouPhp\PhpDesignPattern\Facade\Subsystem;



class ItemDao
{
    private static $instance;
    private $items;
    private function __construct()
    {
        $fp = fopen(dirname(__DIR__).'/item_data.txt', 'r');

        /**
         * ヘッダ行を抜く
         */
        $dummy = fgets($fp, 4096);

        $this->items = array();
        while (($buffer = fgets($fp, 4096)) !== false) {
            $data = explode("\t", trim($buffer));
            if (count($data) !== 3) {
                continue;
            }
            list($item_id, $item_name, $item_price) = $data;

            $item = new Item($item_id, $item_name, $item_price);
            $this->items[$item->getId()] = $item;
        }

        fclose($fp);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new ItemDao();
        }

        return self::$instance;
    }

    public function findById($item_id)
    {
        if (array_key_exists($item_id, $this->items)) {
            return $this->items[$item_id];
        } else {
            return;
        }
    }

    public function setAside(OrderItem $order_item)
    {
        printf('%sの在庫引当をおこないました%s',  $order_item->getItem()->getName(), PHP_EOL);
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
