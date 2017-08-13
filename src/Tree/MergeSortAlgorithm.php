<?php

namespace TreeTest\Tree;

class MergeSortAlgorithm implements SortingAlgorithm
{
    /**
     * @param LinkedListLeaves $listLeaves
     * @return LinkedListLeaves
     */
    public function sort(LinkedListLeaves $listLeaves): LinkedListLeaves
    {
        if (!$listLeaves->isEmpty()) {
            $sorted = $this->mergeSort($listLeaves->getFirst());
            $listLeaves->setHead($sorted);
        };

        return $listLeaves;
    }

    /**
     * @param Leaf $head
     * @return Leaf
     */
    public function mergeSort(Leaf $head): Leaf
    {
        if ($head->getNext() === null) {
            return $head;
        }

        $middle = $this->getMiddle($head);
        $nextToMiddle = $middle->getNext();
        $middle->setNext(null);

        $left = $this->mergeSort($head);
        $right = $this->mergeSort($nextToMiddle);

        $sortedList = $this->sortedMerge($left, $right);

        return $sortedList;
    }

    /**
     * @param Leaf $node
     * @return Leaf
     */
    private function getMiddle(Leaf $node): Leaf
    {
        $slow = $node;
        $fast = $node->getNext();

        while ($fast != null && $fast->getNext() != null) {
                $slow = $slow->getNext();
                $fast = $fast->getNext()->getNext();
        }

        return $slow;
    }

    /**
     * @param $left Leaf|null
     * @param $right Leaf|null
     * @return mixed
     */
    private function sortedMerge($left, $right)
    {
        if ($left === null) {
            return $right;
        }

        if ($right === null) {
            return $left;
        }

        if ($left->getWeight() < $right->getWeight()) {
            $result = $left;
            $result->setNext($this->sortedMerge($left->getNext(), $right));
        } else {
            $result = $right;
            $result->setNext($this->sortedMerge($left, $right->getNext()));
        }

        return $result;
    }
}