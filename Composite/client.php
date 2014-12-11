<?php
namespace DoYouPhp\PhpDesignPattern\Composite;

require dirname(__DIR__).'/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Composite\Composite\Group;
use DoYouPhp\PhpDesignPattern\Composite\Leaf\Employee;

/**
 * 木構造を作成
 */
$root_entry = new Group("001", "本社");
$root_entry->add(new Employee("00101", "CEO"));
$root_entry->add(new Employee("00102", "CTO"));

$group1 = new Group("010", "○○支店");
$group1->add(new Employee("01001", "支店長"));
$group1->add(new Employee("01002", "佐々木"));
$group1->add(new Employee("01003", "鈴木"));
$group1->add(new Employee("01003", "吉田"));

$group2 = new Group("110", "△△営業所");
$group2->add(new Employee("11001", "川村"));
$group1->add($group2);
$root_entry->add($group1);

$group3 = new Group("020", "××支店");
$group3->add(new Employee("02001", "萩原"));
$group3->add(new Employee("02002", "田島"));
$group3->add(new Employee("02002", "白井"));
$root_entry->add($group3);

/**
 * 木構造をダンプ
 */
$root_entry->dump();
