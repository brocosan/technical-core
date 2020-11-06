<?php

class MaxHeap
{
    private $array;

    public function insert($key)
    {
        $this->array[] = $key;
        $this->heapifyUp();
    }

    public function extract()
    {
        $size = count($this->array);
        if ($size == 0) {
            return -1;
        }

        $root = $this->array[0];
        $this->array[0] = $this->array[$size - 1];
        unset($this->array[$size - 1]);
        $this->heapifyDown();
        return $root;
    }

    private function heapifyUp()
    {
        $index = count($this->array) - 1;
        while ($this->array[$index] > $this->array[$this->parent($index)]) {
            $this->swap($index, $this->parent($index));
            $index = $this->parent($index);
        }
    }

    private function heapifyDown()
    {
        $index = 0;
        $lastIndex = count($this->array) - 1;
        $leftIndex = $this->left($index);
        $rightIndex = $this->right($index);
        $childToCompare = 0;

        // loop while index has at least one child
        while ($leftIndex <= $lastIndex) {
            if ($leftIndex == $lastIndex) { // when left child is the only child
                $childToCompare = $leftIndex;
            } elseif ($this->array[$leftIndex] > $this->array[$rightIndex]) { // when left child is larger
                $childToCompare = $leftIndex;
            } else { // when right child is larger
                $childToCompare = $rightIndex;
            }
            // compare array value of current index to larger child and swap if smaller
            if ($this->array[$index] < $this->array[$childToCompare]) {
                $this->swap($index, $childToCompare);
                $index = $childToCompare;
                $leftIndex = $this->left($index);
                $rightIndex = $this->right($index);
            } else {
                return;
            }
        }
    }

    // swap keys in the array
    private function swap($index1, $index2)
    {
        $temp = $this->array[$index1];
        $this->array[$index1] = $this->array[$index2];
        $this->array[$index2] = $temp;
    }
    
    // get the parent index
    private function parent($index)
    {
        return ($index - 1) / 2;
    }
    
    // get the left child index
    private function left($index)
    {
        return 2*$index + 1;
    }
    
    // get the right child index
    private function right($index)
    {
        return 2*$index + 2;
    }
}

// The tree will look like this:
//       50
//     /    \
//   34      48
//  /  \    /
// 8   16  14
//
// In array representation: [50 34 48 8 16 14]

$heap = new MaxHeap();
$heap->insert(8);
$heap->insert(14);
$heap->insert(16);
$heap->insert(34);
$heap->insert(48);
$heap->insert(50);
// var_dump($heap);

$top = $heap->extract();
var_dump($top);  // 50
var_dump($heap); // [48 34 14 8 16]

$top = $heap->extract();
var_dump($top);  // 48
var_dump($heap); // [34 16 14 8]

$top = $heap->extract();
var_dump($top);  // 34
var_dump($heap); // [16 8 14]

$top = $heap->extract();
var_dump($top);  // 16
var_dump($heap); // [14 8]

$top = $heap->extract();
var_dump($top);  // 14
var_dump($heap); // [8]

$top = $heap->extract();
var_dump($top);  // 8
var_dump($heap); // []

$top = $heap->extract();
var_dump($top);  // -1
var_dump($heap); // []
