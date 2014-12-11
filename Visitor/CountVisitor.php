<?php
namespace DoYouPhp\PhpDesignPattern\Visitor;

use DoYouPhp\PhpDesignPattern\Visitor\Visitor;


class CountVisitor implements Visitor
{
    private $group_count = 0;
    private $employee_count = 0;

    public function visit(OrganizationEntry $entry)
    {
        if (get_class($entry) === 'Group') {
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
