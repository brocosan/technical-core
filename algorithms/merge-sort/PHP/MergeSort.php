<?php

function mergeSort(array $array): array
{
    if (count($array) <= 1) {
        return $array;
    }
    $mid = (int) count($array) / 2;
    $left = mergeSort(array_slice($array, 0, $mid));
    $right = mergeSort(array_slice($array, $mid));
    return merge($left, $right);
}

function merge(array $left, array $right): array
{
    $sorted = [];
    $leftIndex = 0;
    $rightIndex = 0;

    while ($leftIndex < count($left) && $rightIndex < count($right)) {
        if ($left[$leftIndex] < $right[$rightIndex]) {
            $sorted[] = $left[$leftIndex];
            $leftIndex++;
        } else {
            $sorted[] = $right[$rightIndex];
            $rightIndex++;
        }
    }

    while ($leftIndex < count($left)) {
        $sorted[] = $left[$leftIndex];
        $leftIndex++;
    }

    while ($rightIndex < count($right)) {
        $sorted[] = $right[$rightIndex];
        $rightIndex++;
    }
    
    return $sorted;
}

$original = [11, 21, 12, -4, 3, 100, 1000, 1, 123];
$sorted = [-4, 1, 3, 11, 12, 21, 100, 123, 1000];

if (mergeSort($original) !== $sorted) {
    printf("got: %s, want: %s", print_r($original, true), print_r($sorted, true));
}
