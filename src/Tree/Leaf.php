<?php

namespace TreeTest\Tree;

use LogicException;

class Leaf
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $weight;
    /**
     * @var Leaf
     */
    protected $next;

    /**
     * Leaf constructor.
     * @param string $name
     * @param int $weight
     */
    public function __construct(string $name, int $weight)
    {
        if ($weight == 0) {
            throw new LogicException('Weight should be != 0');
        }
        $this->name = $name;
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @return Leaf|null
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param Leaf $leaf
     * @return Leaf
     */
    public function setNext($leaf)
    {
        return $this->next = $leaf;
    }

}