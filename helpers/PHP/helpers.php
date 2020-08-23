<?php

function println($str)
{
    echo $str . "\n";
}

function assertEqual($expected, $given)
{
    if ($expected !== $given) {
        println('ERROR: expected ' . $expected . ' got ' . $given);
        exit;
    } else {
        println('TEST PASS');
    }
}

//======================================================================
// LINKED LISTS
//======================================================================
function linkedListToArray($list)
{
    $array = [];
    $node = $list->head;
    while ($node !== null) {
        $array[] = $node->data;
        $node = $node->next;
    }
    return $array;
}

function linkedListAssertEqual($expected, $list)
{
    assertEqual($expected, implode(',', linkedListToArray($list)));
}
