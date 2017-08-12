<?php
/**
 * Created by PhpStorm.
 * User: myroslav
 * Date: 09.08.17
 * Time: 13:38
 */

namespace TreeTest\Tree;

interface SortingAlgorithm
{
    public function sort(LinkedListLeaves $leavesList): LinkedListLeaves;
}