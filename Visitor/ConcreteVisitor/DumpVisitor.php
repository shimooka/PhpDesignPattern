<?php
namespace DoYouPhp\PhpDesignPattern\Visitor\ConcreteVisitor;

use DoYouPhp\PhpDesignPattern\Visitor\Visitor\Visitor;
use DoYouPhp\PhpDesignPattern\Visitor\Element\OrganizationEntry;

class DumpVisitor implements Visitor
{
    public function visit(OrganizationEntry $entry)
    {
        if ($entry instanceof \DoYouPhp\PhpDesignPattern\Visitor\ConcreteElement\Group) {
            echo '■';
        } else {
            echo '-->';
        }
        echo $entry->getCode().":".$entry->getName().PHP_EOL;

        foreach ($entry->getChildren() as $child) {
            $child->accept($this);
        }
    }
}
