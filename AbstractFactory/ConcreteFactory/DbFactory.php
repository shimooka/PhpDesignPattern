<?php
namespace DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteFactory;

use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractFactory\DaoFactory;
use DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct\DbItemDao;
use DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct\DbOrderDao;

class DbFactory implements DaoFactory
{
    public function createItemDao()
    {
        return new DbItemDao();
    }
    public function createOrderDao()
    {
        return new DbOrderDao($this->createItemDao());
    }
}
