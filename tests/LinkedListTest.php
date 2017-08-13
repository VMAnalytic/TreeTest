<?php
use TreeTest\Tree\Leaf;
use TreeTest\Tree\LinkedListLeaves;

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
        $secondLeavesList->push(new Leaf('eight', 8));

        $firstLeavesList->merge($secondLeavesList);

        $this->assertEquals($firstLeavesList->getLast()->getName(), 'eight');
        $this->assertEquals($firstLeavesList->getSize(), 8);
        $this->assertFalse($firstLeavesList->isEmpty());
    }

    public function testZeroWeightException()
    {
        $this->expectException(LogicException::class);

        $firstLeavesList = new LinkedListLeaves();
        $firstLeavesList->add('zero', 0);
    }

}
