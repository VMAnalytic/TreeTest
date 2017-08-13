<?php

namespace TreeTest\Tree;

interface Visitor
{
    public function visit(Node $node);
}