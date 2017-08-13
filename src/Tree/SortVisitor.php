<?php

namespace TreeTest\Tree;

class SortVisitor implements Visitor
{
    const LIMIT = 3;
    /**
     * @var SortingAlgorithm
     */
    private $sortAlgorithm;

    /**
     * @var LinkedListLeaves
     */
    private $tail;

    /**
     * SortVisitor constructor.
     * @param SortingAlgorithm $sortAlgorithm
     */
    public function __construct(SortingAlgorithm $sortAlgorithm)
    {
        $this->sortAlgorithm = $sortAlgorithm;
        $this->tail = new LinkedListLeaves();
    }

    /**
     * @param Node $node
     */
    public function visit(Node $node)
    {
        $node = $this->mergeTail($node);
        if ($node->hasLeafs()) {
            $sorted = $this->sortAlgorithm->sort($node->getLeafs());
            $node->clearLeaves();
            $this->fillNode($node, $sorted);
        }
        /** @var Node $child */
        foreach ($node->getChildren() as $child) {
            $child->accept($this);
        }
    }

    private function mergeTail(Node $node)
    {
        if (!$this->tail->isEmpty()) {
            $node->addLeafs($this->tail);
        }

        return $node;
    }

    private function fillNode(Node $node, LinkedListLeaves $sortedList)
    {
        $sum = 0;
        while ($sortedList->getFirst() && self::LIMIT  >= ($sum + $sortedList->getFirst()->getWeight())) {
            $leaf = $sortedList->shift();
            $node->push($leaf);
            $sum += $leaf->getWeight();

        }
        $this->tail = $sortedList;
    }
}