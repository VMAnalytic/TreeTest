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
    /**
     * @var SortAlgorithm
     */
    private $sortAlgorithm;

    private $tail;

    public function __construct(SortAlgorithm $sortAlgorithm)
    {
        $this->sortAlgorithm = $sortAlgorithm;
    }

    public function visit(Node $node)
    {
        if ($node->geLeafs() !== null) {
            if ($this->tail !== null) {
                $node->addLeafs($this->tail);
            }
            $this->tail = $this->sortAlgorithm->sort($node->geLeafs());

            /** @var Node $child */
            foreach ($node->getChildren() as $child) {
                $child->accept($this);
            }
        }

//        return $nodes;
    }
}