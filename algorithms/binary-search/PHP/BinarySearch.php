<?php

function binarySearch(array $array, int $search): int
{
    $low = 0;
    $high = count($array) - 1;
    while ($low <= $high) {
        $mid = intval(($low + $high) / 2);
        if ($array[$mid] == $search) {
            return $mid;
        }
        if ($array[$mid] < $search) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }
    return -1;
}

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$tests = [
    1 => 0,
    5 => 4,
    42 => -1,
    10 => 9,
];
foreach ($tests as $search => $wanted) {
    $result = binarySearch($array, $search);
    if ($result !== $wanted) {
        printf("got: %d, want: %d\n", $result, $wanted);
    }
}
