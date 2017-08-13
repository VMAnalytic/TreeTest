<?php

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
     * @param Leaf $leaf
     * @return LinkedListLeaves
     */
    public function setHead(Leaf $leaf): LinkedListLeaves
    {
        $this->head = $leaf;

        return $this;
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
    public function getSize(): int
    {
        return $this->size;
    }

    public function merge(LinkedListLeaves $leaves)
    {
        if ($this->getLast()) {
            $this->getLast()->setNext($leaves->getFirst());
        } elseif ($leaves->getFirst()) {
//            $this->head = $leaves->getFirst();
        }
        $this->size += $leaves->getSize();

        return $this;
    }

    /**
     * @param Leaf $leaf
     */
    public function push(Leaf $leaf)
    {
        $this->add($leaf->getName(), $leaf->getWeight());
    }

    /**
     * @return null|Leaf
     */
    public function shift()
    {
        if ($this->head === null) {
            return null;
        }
        $temp = $this->head;
        $this->head = $this->head->getNext();
        if($this->head != null)
            $this->size--;

        return $temp;
    }
}