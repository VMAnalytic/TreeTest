<?php
use TreeTest\Tree\LinkedListLeaves;
use TreeTest\Tree\Node;
use TreeTest\Tree\SortAlgorithm;
use TreeTest\Tree\SortVisitor;

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12.08.2017
 * Time: 17:32
 */
class LinkedListTest extends PHPUnit_Framework_TestCase
{
    public function testLinkedLeavesListFilling()
    {
        $leavesList = new LinkedListLeaves();
        $leavesList->add('one', 1);
        $leavesList->add('two', 2);
        $leavesList->add('three', 3);
        $leavesList->add('four', 4);
        $leavesList->add('five', 5);

        $this->assertEquals($leavesList->getSize(), 5);
        $this->assertEquals($leavesList->getLast()->getName(), 'five');
        $this->assertEquals($leavesList->getFirst()->getName(), 'one');
    }

    public function testLinkedLeavesListMerging()
    {
        $firstLeavesList = new LinkedListLeaves();
        $firstLeavesList->add('one', 1);
        $firstLeavesList->add('two', 2);
        $firstLeavesList->add('three', 3);
        $firstLeavesList->add('four', 4);
        $firstLeavesList->add('five', 5);

        $secondLeavesList = new LinkedListLeaves();
        $secondLeavesList->add('six', 6);
        $secondLeavesList->add('seven', 7);

        $firstLeavesList->merge($secondLeavesList);

        $this->assertEquals($firstLeavesList->getLast()->getName(), 'seven');
        $this->assertEquals($firstLeavesList->getSize(), 7);
        $this->assertFalse($firstLeavesList->isEmpty());
    }

}
