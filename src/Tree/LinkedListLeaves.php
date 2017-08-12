<?php
/**
 * Created by PhpStorm.
 * User: myroslav
 * Date: 09.08.17
 * Time: 13:38
 */

namespace TreeTest\Tree;


class LinkedListLeaves
{
    /**
     * @var Leaf
     */
    private $head;

    /**
     * @var Leaf
     */
    private $last;

    /**
     * @var int
     */
    private $size;

    /**
     * LinkedListLeaves constructor.
     */
    public function __construct()
    {
        $this->size = 0;
    }

    /**
     * @param string $name
     * @param int $weight
     */
    public function add(string $name, int $weight)
    {
        $leaf = new Leaf($name, $weight);
        if ($this->head === null) {
            $this->head = $leaf;
        } else {
            $last = $this->getLast();
            $last->setNext($leaf);
        }
        $this->size++;
    }

    public function sort()
    {
        if ($this->size > 1) {
            for ($i = 0; $i < $this->size; $i++ ) {
                $currentNode = $this->head;
                /** @var Leaf $next */
                $next = $this->head->getNext();
                for ($j = 0; $j < $this->size - 1; $j++) {
                    if ($currentNode->getWeight() > $next->getWeight()) {
                        $temp = $currentNode;
                        $currentNode = $next;
                        $next = $temp;
                    }
                    $currentNode = $next;
                    $next = $next->getNext();
                }
            }
        }
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->head === null;
    }

    /**
     * @return Leaf|null
     */
    public function getFirst()
    {
        return $this->head;
    }

    /**
     * @return Leaf|null
     */
    public function getLast()
    {
        $current = $this->head;
        while ($current->getNext() !== null) {
            $current = $current->getNext();
        }
        return $current;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function merge(LinkedListLeaves $leaves)
    {
        $this->getLast()->setNext($leaves->getFirst());
        $this->size += $leaves->getSize();
    }
}