<?php
namespace DoYouPhp\PhpDesignPattern\Iterator;

use DoYouPhp\PhpDesignPattern\Iterator\Employee;


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
        return $this->employees->getIterator();
    }
}
