<?php
namespace DoYouPhp\PhpDesignPattern\Proxy\Subject;

interface ItemDao
{
    public function findById($item_id);
}
