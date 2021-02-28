<?php

function insertionSort(array $array): array
{
    for ($i = 1; $i < count($array); $i++) {
        $key = $array[$i];
        $j = $i - 1;
        while ($j >= 0 && $array[$j] > $key) {
            $array[$j + 1] = $array[$j];
            $j--;
        }
        $array[$j + 1] = $key;
    }
    return $array;
}

$original = [11, 21, 12, -4, 3, 100, 1000, 1, 123];
$sorted = [-4, 1, 3, 11, 12, 21, 100, 123, 1000];

if (insertionSort($original) !== $sorted) {
    printf("got: %s, want: %s", print_r($original, true), print_r($sorted, true));
}
