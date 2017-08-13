<?php

use TreeTest\Tree\Leaf;
use TreeTest\Tree\LinkedListLeaves;
use TreeTest\Tree\MergeSortAlgorithm;
use TreeTest\Tree\Node;
use TreeTest\Tree\SortVisitor;
use TreeTest\Tree\TestVisitor;

class SortingTest extends PHPUnit_Framework_TestCase
{
    public function testByWeightNodeSorting()
    {
        $root = new Node('root');
        $root->addChild($fistNode = new Node('a1'))
             ->addChild($secondNode = new Node('a2'))
             ->addChild($thirdNode = new Node('a3'));

        $root->addLeaf('b2', 2)
             ->addLeaf('b4', 4)
             ->addLeaf('b3', 3)
             ->addLeaf('b1', 1);

        $visitor = new SortVisitor(new MergeSortAlgorithm());

        $root->accept($visitor);

        $this->assertEquals($root->getLeafs()->getTotalWeight(), 3);
        $this->assertEquals($fistNode->getLeafs()->getTotalWeight(), 3);
        $this->assertEquals($secondNode->getLeafs()->getTotalWeight(), 0);
        $this->assertEquals($thirdNode->getLeafs()->getTotalWeight(), 0);
    }

    public function testLinkedLeavesListFilling()
    {
        $root = new Node('root');
        $root->addChild($fistNode = new Node('a1'))
            ->addChild($secondNode = new Node('a2'))
            ->addChild($thirdNode = new Node('a3'));

        $root->addLeaf('b2', 2)
            ->addLeaf('b4', 4)
            ->addLeaf('b3', 3)
            ->addLeaf('b7', 7)
            ->addLeaf('b4_2', 4)
            ->addLeaf('b3_2', 3)
            ->addLeaf('b8', 8);

        $fistNode->addLeaf('c1', 1);
        $secondNode->addLeaf('d9', 9);
        $thirdNode->addLeaf('e5', 5);

        $visitor = new SortVisitor(new MergeSortAlgorithm());

        $result = $root->accept($visitor);

        $testVisitor = new TestVisitor();
        $result->accept($testVisitor);
    }

    public function testMergeSorting()
    {
        $leavesList = new LinkedListLeaves();
        $leavesList->push($two = new Leaf('two', 2));
        $leavesList->push($one = new Leaf('one', 1));
        $leavesList->push($three = new Leaf('three', 3));
        $leavesList->push($five = new Leaf('five', 5));
        $leavesList->push($four = new Leaf('four', 4));
        $leavesList->push($minus = new Leaf('minus', -10));

        $sortAlgorithm = new MergeSortAlgorithm();

        $sortAlgorithm->sort($leavesList);

        $sortedNames = [];
        /** @var Leaf $leaf */
        foreach ($leavesList->toArray() as $leaf) {
            $sortedNames[] = $leaf->getName();
        }

        $this->assertSame([
            $minus->getName(),
            $one->getName(),
            $two->getName(),
            $three->getName(),
            $four->getName(),
            $five->getName()
        ], $sortedNames);
    }

}
