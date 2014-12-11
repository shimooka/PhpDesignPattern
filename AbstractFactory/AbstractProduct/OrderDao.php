<?php
namespace DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct;

interface OrderDao
{
    public function findById($order_id);
}
