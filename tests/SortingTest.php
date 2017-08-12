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
//        $root->addChild(new Node('one'))
//             ->addChild(new Node('two'))
//             ->addChild(new Node('three'));

        $root->addLeaf('leafOne', 3)
             ->addLeaf('leafTwo', 2)
             ->addLeaf('leafThree', 1)
             ->addLeaf('leafFour', 4)
             ->addLeaf('leafFive', 5)
             ->addLeaf('leafSix', 6)
             ->addLeaf('leafSeven', 7);

        $visitor = new SortVisitor(new MergeSortAlgorithm());



        $result = $root->accept($visitor);
        print_r($result);
    }

}
