<?php

function bubbleSort(array $array): array
{
    $arrayLength = count($array) - 1;
    $isSorted = false;
    while (!$isSorted) {
        $isSorted = true;
        for ($i = 0; $i < $arrayLength; $i++) {
            if ($array[$i] > $array[$i + 1]) {
                $tmp = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $tmp;
                $isSorted = false;
            }
        }
    }
    return $array;
}

$original = [11, 21, 12, -4, 3, 100, 1000, 1, 123];
$sorted = [-4, 1, 3, 11, 12, 21, 100, 123, 1000];

if (bubbleSort($original) !== $sorted) {
    printf("got: %s, want: %s", print_r($original, true), print_r($sorted, true));
}
