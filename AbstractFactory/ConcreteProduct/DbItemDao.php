<?php
namespace DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct;

use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct\ItemDao;
use DoYouPhp\PhpDesignPattern\AbstractFactory\Model\Item;

class DbItemDao implements ItemDao
{
    private $items;
    public function __construct()
    {
        $fp = fopen(dirname(__DIR__).'/item_data.txt', 'r');

        /**
         * ヘッダ行を抜く
         */
        $dummy = fgets($fp, 4096);

        $this->items = array();
        while (($buffer = fgets($fp, 4096)) !== false) {
            $data = explode("\t", trim($buffer));
            if (count($data) !== 2) {
                continue;
            }
            list($item_id, $item_name) = $data;

            $item = new Item($item_id, $item_name);
            $this->items[$item->getId()] = $item;
        }

        fclose($fp);
    }

    public function findById($item_id)
    {
        if (array_key_exists($item_id, $this->items)) {
            return $this->items[$item_id];
        } else {
            return;
        }
    }
}
