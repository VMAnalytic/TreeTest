<?php
/**
 * Created by PhpStorm.
 * User: myroslav
 * Date: 09.08.17
 * Time: 13:38
 */

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
    private $leafs;

    /**
     * Node constructor.
     * @param string $name
     */
    public function __construct(string $name) {
        $this->name = $name;
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

    public function addLeaf(string $name, int $weight)
    {
        if ($this->leafs === null) {
            $this->leafs = new LinkedListLeaves();
        }
        $this->leafs->add($name, $weight);

        return $this;
    }

    public function addLeafs(LinkedListLeaves $linkedListLeaves)
    {
        $this->leafs->merge($linkedListLeaves);

        return $this;
    }


    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(Node $parent = null)
    {
        $this->parent = $parent;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function geLeafs()
    {
        return $this->leafs;
    }

    public function hasLeafs(): bool
    {
        return $this->leafs->getSize() > 0;
    }

    public function sort(SortAlgorithm $sortAlgorithm)
    {
        $this->leafs->merge($tail);
        $newTail = $sortAlgorithm->sort($this->leafs);

        foreach ($this->children as $childrenNode) {
            $childrenNode->visit($sortAlgorithm, $newTail);
        }
    }

    public function accept(SortVisitor $visitor)
    {
//        return $visitor->visit($this);
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


}