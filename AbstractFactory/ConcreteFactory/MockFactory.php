<?php
namespace DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteFactory;

use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractFactory\DaoFactory;
use DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct\MockItemDao;
use DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct\MockOrderDao;

class MockFactory implements DaoFactory
{
    public function createItemDao()
    {
        return new MockItemDao();
    }
    public function createOrderDao()
    {
        return new MockOrderDao();
    }
}
