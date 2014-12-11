<?php
namespace DoYouPhp\PhpDesignPattern\Proxy\RealSubject;

use DoYouPhp\PhpDesignPattern\Proxy\Subject\ItemDao;
use DoYouPhp\PhpDesignPattern\Proxy\Model\Item;

class DbItemDao implements ItemDao
{
    public function findById($item_id)
    {
        $fp = fopen(dirname(__DIR__).'/item_data.txt', 'r');

        /**
         * ヘッダ行を抜く
         */
        $dummy = fgets($fp, 4096);

        $item = null;
        while (($buffer = fgets($fp, 4096)) !== false) {
            $data = explode("\t", trim($buffer));
            if (count($data) !== 2) {
                continue;
            }
            list($id, $name) = $data;

            if ($item_id === (int) $id) {
                $item = new Item($id, $name);
                break;
            }
        }

        fclose($fp);

        return $item;
    }
}
