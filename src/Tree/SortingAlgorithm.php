<?php

namespace TreeTest\Tree;

interface SortingAlgorithm
{
    /**
     * @param LinkedListLeaves $leavesList
     * @return LinkedListLeaves
     */
    public function sort(LinkedListLeaves $leavesList): LinkedListLeaves;
}