<?php
namespace DoYouPhp\PhpDesignPattern\Visitor\Visitor;

use DoYouPhp\PhpDesignPattern\Visitor\Element\OrganizationEntry;

interface Visitor
{
    public function visit(OrganizationEntry $entry);
}
