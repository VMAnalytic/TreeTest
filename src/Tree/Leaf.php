<?php
/**
 * Created by PhpStorm.
 * User: myroslav
 * Date: 10.08.17
 * Time: 10:54
 */

namespace TreeTest\Tree;


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
    public function setNext(Leaf $leaf)
    {
        return $this->next = $leaf;
    }
}