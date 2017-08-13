<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12.08.2017
 * Time: 15:49
 */

namespace TreeTest\Tree;

interface Visitor
{
    public function visit(Node $node);
}