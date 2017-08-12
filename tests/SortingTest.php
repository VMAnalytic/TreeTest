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
class SortingTest extends PHPUnit_Framework_TestCase
{
    public function testLinkedLeavesListFilling()
    {
        $root = new Node('root');
        $root->addChild(new Node('one'))
             ->addChild(new Node('two'))
             ->addChild(new Node('three'));

        $root->addLeaf('leafOne', 1)
             ->addLeaf('leafTwo', 2)
             ->addLeaf('leafThree', 3);

        $visitor = new SortVisitor(new SortAlgorithm());

        $result = $root->accept($visitor);
    }

}
