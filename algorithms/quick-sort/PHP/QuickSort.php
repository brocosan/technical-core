<?php

function quickSort(array $array): array
{
    $arrayLength = count($array);
    if ($arrayLength <= 1) {
        return $array;
    }
    $pivot = $array[$arrayLength - 1];
    $lowPart = [];
    $highPart = [];
    for ($i = 0; $i < $arrayLength - 1; $i++) {
        if ($array[$i] < $pivot) {
            $lowPart[] = $array[$i];
        } else {
            $highPart[] = $array[$i];
        }
    }
    $lowPart = quickSort($lowPart);
    $highPart = quickSort($highPart);
    return array_merge($lowPart, [$pivot], $highPart);
}

$original = [11, 21, 12, -4, 3, 100, 1000, 1, 123];
$sorted = [-4, 1, 3, 11, 12, 21, 100, 123, 1000];

if (quickSort($original) !== $sorted) {
    printf("got: %s, want: %s", print_r($original, true), print_r($sorted, true));
}
