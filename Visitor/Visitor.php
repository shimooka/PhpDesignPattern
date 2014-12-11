<?php
namespace DoYouPhp\PhpDesignPattern\Visitor;

use DoYouPhp\PhpDesignPattern\Visitor\OrganizationEntry;


interface Visitor
{
    public function visit(OrganizationEntry $entry);
}
