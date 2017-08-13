<?php

namespace TreeTest\Tree;

class Node
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var Node
     */
    private $parent;

    /**
     * @var array
     */
    private $children = [];

    /**
     * @var LinkedListLeaves
     */
    private $leavesList;

    /**
     * Node constructor.
     * @param string $name
     */
    public function __construct(string $name) {
        $this->name = $name;
        $this->leavesList = new LinkedListLeaves();
    }

    /**
     * @param Node $child
     * @return $this
     */
    public function addChild(Node $child)
    {
        $child->setParent($this);
        $this->children[] = $child;

        return $this;
    }

    /**
     * @param string $name
     * @param int $weight
     * @return $this
     */
    public function addLeaf(string $name, int $weight)
    {
        $this->leavesList->add($name, $weight);

        return $this;
    }

    public function addLeafs(LinkedListLeaves $linkedListLeaves)
    {
        $this->leavesList->merge($linkedListLeaves);

        return $this;
    }

    /**
     * @param Leaf $leaf
     * @return $this
     */
    public function push(Leaf $leaf)
    {
        $this->leavesList->add($leaf->getName(), $leaf->getWeight());

        return $this;
    }

    /**
     * @return Node|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Node|null $parent
     */
    public function setParent(Node $parent = null)
    {
        $this->parent = $parent;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    public function getLeafs()
    {
        return $this->leavesList;
    }

    /**
     * @return bool
     */
    public function hasLeafs(): bool
    {
        return $this->leavesList->getSize() > 0;
    }

    /**
     * @param Visitor $visitor
     * @return $this
     */
    public function accept(Visitor $visitor)
    {
        $visitor->visit($this);

        return $this;
    }

    /**
     * @return bool
     */
    public function isRoot()
    {
        return $this->getParent() === null;
    }

    public function clearLeaves()
    {
        $this->leavesList = new LinkedListLeaves();
    }

}