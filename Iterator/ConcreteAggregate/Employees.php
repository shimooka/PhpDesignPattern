<?php
namespace DoYouPhp\PhpDesignPattern\Iterator\ConcreteAggregate;

use DoYouPhp\PhpDesignPattern\Iterator\Model\Employee;

class Employees implements \IteratorAggregate
{
    private $employees;
    public function __construct()
    {
        $this->employees = new \ArrayObject();
    }
    public function add(Employee $employee)
    {
        $this->employees[] = $employee;
    }
    public function getIterator()
    {
        /**
         * \ArrayObjectのgetIteratorメソッドを使って
         * イテレータを取得して返す
         */
        return $this->employees->getIterator();
    }
}
