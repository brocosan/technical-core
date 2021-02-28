<?php

function selectionSort(array $array): array
{
    $arrayLength = count($array);
    for ($i = 0; $i < $arrayLength; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < $arrayLength; $j++) {
            if ($array[$j] < $array[$min]) {
                $min = $j;
            }
        }
        if ($min != $i) {
            $tmp = $array[$i];
            $array[$i] = $array[$min];
            $array[$min] = $tmp;
        }
    }
    return $array;
}

$original = [11, 21, 12, -4, 3, 100, 1000, 1, 123];
$sorted = [-4, 1, 3, 11, 12, 21, 100, 123, 1000];

if (selectionSort($original) !== $sorted) {
    printf("got: %s, want: %s", print_r($original, true), print_r($sorted, true));
}
