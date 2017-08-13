<?php
namespace TreeTest\Tree;

use UnexpectedValueException;

class TestVisitor implements Visitor
{
    /**
     * @param Node $node
     */
    public function visit(Node $node)
    {
        $leavesList = $node->getLeafs();
        if ($leavesList->getTotalWeight() > SortVisitor::LIMIT) {
            throw new UnexpectedValueException('SortVisitor logic is wrong');
        }

        /** @var Node $child */
        foreach ($node->getChildren() as $child) {
            $child->accept($this);
        }
    }

}