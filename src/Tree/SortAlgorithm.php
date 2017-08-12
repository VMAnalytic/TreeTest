<?php
/**
 * Created by PhpStorm.
 * User: myroslav
 * Date: 09.08.17
 * Time: 13:38
 */

namespace TreeTest\Tree;


class SortAlgorithm
{
    const LIMIT = 3;

    public function sort(LinkedListLeaves $leavesList): LinkedListLeaves
    {
        $listSize = $leavesList->getSize();
        $sum = 0;
        if ($listSize > 1) {
            for ($i = 0; $i < $listSize; $i++ ) {
                $currentNode = $leavesList->getFirst();
                /** @var Leaf $next */
                $next =  $leavesList->getFirst()->getNext();
                for ($j = 0; $j < $listSize - 1; $j++) {
                    $sum += $currentNode->getWeight();
                    if ($currentNode->getWeight() > $next->getWeight()) {
                        $temp = $currentNode;
                        $currentNode = $next;
                        $next = $temp;
                    }
                    $currentNode = $next;
                    $next = $next->getNext();
                }
            }
        }
        return new LinkedListLeaves();
    }
}