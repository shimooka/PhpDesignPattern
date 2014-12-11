<?php
namespace DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct;

interface ItemDao
{
    public function findById($item_id);
}
