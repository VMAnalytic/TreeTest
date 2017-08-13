<?php

namespace TreeTest\Tree;

interface SortingAlgorithm
{
    public function sort(LinkedListLeaves $leavesList): LinkedListLeaves;
}