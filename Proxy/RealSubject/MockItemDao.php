<?php
namespace DoYouPhp\PhpDesignPattern\Proxy\RealSubject;

use DoYouPhp\PhpDesignPattern\Proxy\Subject\ItemDao;
use DoYouPhp\PhpDesignPattern\Proxy\Model\Item;

class MockItemDao implements ItemDao
{
    public function findById($item_id)
    {
        $item = new Item($item_id, 'ダミー商品');

        return $item;
    }
}
