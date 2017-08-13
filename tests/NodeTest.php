<?php

use TreeTest\Tree\Node;

class NodeTest extends PHPUnit_Framework_TestCase
{
    public function testRoot()
    {
        $root = new Node('root');
        $root->addChild($first = new Node('one'));

        $this->assertTrue($root->isRoot());
        $this->assertFalse($first->isRoot());
    }

    public function testNodesAddition()
    {
        $root = new Node('root');
        $root->addChild(new Node('one'))
             ->addChild(new Node('two'))
             ->addChild(new Node('three'))
             ->addChild(new Node('four'))
             ->addChild(new Node('five'));

        $this->assertEquals(count($root->getChildren()), 5);
    }

    public function testLeavesAddition()
    {
        $root = new Node('root');
        $root->addChild(new Node('one'))
             ->addChild(new Node('two'))
             ->addChild(new Node('three'));

        $root->addLeaf('leafOne', 1)
             ->addLeaf('leafTwo', 2)
             ->addLeaf('leafThree', 3);

        $this->assertTrue($root->hasLeafs());
        $this->assertEquals($root->getLeafs()->getSize(), 3);
    }

    public function testGetParent()
    {
        $root = new Node('test');

        $root->addChild($first = new Node('one'))
             ->addChild($second = new Node('two'));

        $this->assertNull($root->getParent());
        $this->assertSame($root, $first->getParent());
    }
}
