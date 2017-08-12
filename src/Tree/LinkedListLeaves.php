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
        if ($current === null) {
            return $current;
        }
        while ($current->getNext() !== null) {
            $current = $current->getNext();
        }

        return $current;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    public function merge(LinkedListLeaves $leaves)
    {
        if ($this->isEmpty()) {
            return $leaves;
        }
        if ($this->getFirst()) {
            $this->getFirst()->setNext($leaves->getFirst());
        }
        if ($this->getLast()) {
            $this->getLast()->setNext($leaves->getFirst());
        }
        $this->size += $leaves->getSize();

        return $this;
    }

    public function push(Leaf $leaf)
    {
        if ($this->head === null) {
            $this->head = $leaf;
        } else {
            $last = $this->getLast();
            $last->setNext($leaf);
        }
        $this->size++;
    }

    public function shift()
    {
        $temp = $this->head;
        $this->head = $this->head->getNext();
        if($this->head != null)
            $this->size--;

        return $temp;
    }
}