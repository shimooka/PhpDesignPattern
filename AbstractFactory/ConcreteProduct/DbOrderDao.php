<?php
namespace DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct;

use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct\ItemDao;
use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct\OrderDao;
use DoYouPhp\PhpDesignPattern\AbstractFactory\Model\Order;

class DbOrderDao implements OrderDao
{
    private $orders;
    public function __construct(ItemDao $item_dao)
    {
        $fp = fopen(dirname(__DIR__).'/order_data.txt', 'r');

        /**
         * ヘッダ行を抜く
         */
        $dummy = fgets($fp, 4096);

        $this->orders = array();
        while (($buffer = fgets($fp, 4096)) !== false) {
            $data = explode("\t", trim($buffer));
            if (count($data) !== 2) {
                continue;
            }
            list($order_id, $item_ids) = $data;

            $order = new Order($order_id);
            foreach (explode(',', $item_ids) as $item_id) {
                $item = $item_dao->findById($item_id);
                if (!is_null($item)) {
                    $order->addItem($item);
                }
            }
            $this->orders[$order->getId()] = $order;
        }

        fclose($fp);
    }

    public function findById($order_id)
    {
        if (array_key_exists($order_id, $this->orders)) {
            return $this->orders[$order_id];
        } else {
            return;
        }
    }
}
