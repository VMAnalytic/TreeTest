<?php

namespace TreeTest\Tree;

interface Visitor
{
    /**
     * @param Node $node
     * @return mixed
     */
    public function visit(Node $node);
}