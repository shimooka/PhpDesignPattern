<?php
namespace DoYouPhp\PhpDesignPattern\Visitor\ConcreteVisitor;

use DoYouPhp\PhpDesignPattern\Visitor\Visitor\Visitor;
use DoYouPhp\PhpDesignPattern\Visitor\Element\OrganizationEntry;

class CountVisitor implements Visitor
{
    private $group_count = 0;
    private $employee_count = 0;

    public function visit(OrganizationEntry $entry)
    {
        if ($entry instanceof \DoYouPhp\PhpDesignPattern\Visitor\ConcreteElement\Group) {
            $this->group_count++;
        } else {
            $this->employee_count++;
        }
        foreach ($entry->getChildren() as $ent) {
            $this->visit($ent);
        }
    }

    public function getGroupCount()
    {
        return $this->group_count;
    }

    public function getEmployeeCount()
    {
        return $this->employee_count;
    }
}
