<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12.08.2017
 * Time: 15:49
 */

namespace TreeTest\Tree;


class SortVisitor
{
    const LIMIT = 3;
    /**
     * @var SortAlgorithm
     */
    private $sortAlgorithm;

    private $tail;

    public function __construct(SortingAlgorithm $sortAlgorithm)
    {
        $this->sortAlgorithm = $sortAlgorithm;
    }

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

//        return $nodes;
    }

    private function mergeTail(Node $node)
    {
        if ($this->tail !== null) {
            $node->addLeafs($this->tail);
        }

        return $node;
    }

    private function fillNode(Node $node, LinkedListLeaves $sorted)
    {
        $sum = 0;
        while ($sum < self::LIMIT) {
            $leaf = $sorted->shift();
            $node->push($leaf);
            $sum += $leaf->getWeight();
        }
    }
}