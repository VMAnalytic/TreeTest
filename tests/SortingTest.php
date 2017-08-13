<?php
use TreeTest\Tree\LinkedListLeaves;
use TreeTest\Tree\MergeSortAlgorithm;
use TreeTest\Tree\Node;
use TreeTest\Tree\SortAlgorithm;
use TreeTest\Tree\SortVisitor;

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12.08.2017
 * Time: 17:32
 */
class SortingTest extends PHPUnit_Framework_TestCase
{
    public function testLinkedLeavesListFilling()
    {
        $root = new Node('root');
        $root->addChild(new Node('a1'))
             ->addChild(new Node('a2'))
             ->addChild(new Node('a3'));

        $root->addLeaf('b2', 2)
             ->addLeaf('b4', 4)
             ->addLeaf('b3', 3)
             ->addLeaf('b1', 1);

        $visitor = new SortVisitor(new MergeSortAlgorithm());

        $result = $root->accept($visitor);
    }

}
