<?php
namespace DoYouPhp\PhpDesignPattern\Proxy;

use DoYouPhp\PhpDesignPattern\Proxy\ItemDao;
use DoYouPhp\PhpDesignPattern\Proxy\Item;


class MockItemDao implements ItemDao
{
    public function findById($item_id)
    {
        $item = new Item($item_id, 'ダミー商品');

        return $item;
    }
}
