<?php
namespace DoYouPhp\PhpDesignPattern\Visitor;

use DoYouPhp\PhpDesignPattern\Visitor\Visitor;


class DumpVisitor implements Visitor
{
    public function visit(OrganizationEntry $entry)
    {
        if (get_class($entry) === 'Group') {
            echo '■';
        } else {
            echo '&nbsp;&nbsp;';
        }
        echo $entry->getCode().":".$entry->getName()."<br>\n";

        foreach ($entry->getChildren() as $ent) {
            $ent->accept($this);
        }
    }
}
