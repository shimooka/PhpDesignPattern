<?php
namespace DoYouPhp\PhpDesignPattern\Iterator;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Iterator\Employee;
use DoYouPhp\PhpDesignPattern\Iterator\Employees;
use DoYouPhp\PhpDesignPattern\Iterator\SalesmanIterator;


function dumpWithForeach(\Iterator $iterator) {
    foreach ($iterator as $employee) {
        printf('%s (%d, %s)%s',
               $employee->getName(),
               $employee->getAge(),
               $employee->getJob(),
               PHP_EOL);
    }
}


$employees = new Employees();
$employees->add(new Employee('SMITH', 32, 'CLERK'));
$employees->add(new Employee('ALLEN', 26, 'SALESMAN'));
$employees->add(new Employee('MARTIN', 50, 'SALESMAN'));
$employees->add(new Employee('CLARK', 45, 'MANAGER'));
$employees->add(new Employee('KING', 58, 'PRESIDENT'));

$iterator = $employees->getIterator();

/**
 * Iteratorのメソッドを利用する
 */
echo 'Iteratorのメソッドを利用する' . PHP_EOL;
while ($iterator->valid()) {
    $employee = $iterator->current();
    printf('%s (%d, %s)%s',
           $employee->getName(),
           $employee->getAge(),
           $employee->getJob(),
           PHP_EOL);

    $iterator->next();
}

/**
 * foreach文を利用する
 */
echo 'foreach文を利用する' . PHP_EOL;
dumpWithForeach($iterator);

/**
 * 異なるiteratorで要素を取得する
 */
echo '異なるiteratorで要素を取得する' . PHP_EOL;
dumpWithForeach(new SalesmanIterator($iterator));
