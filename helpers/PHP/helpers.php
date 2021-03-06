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

//======================================================================
// STACKS
//======================================================================
function stackToArray($stack)
{
    $array = [];
    $node = $stack->top;
    while ($node !== null) {
        $array[] = $node->data;
        $node = $node->next;
    }
    return $array;
}

function stackAssertEqual($expected, $list)
{
    assertEqual($expected, implode(',', stackToArray($list)));
}

//======================================================================
// QUEUES
//======================================================================
function queueToArray($queue)
{
    $array = [];
    $node = $queue->head;
    while ($node !== null) {
        $array[] = $node->data;
        $node = $node->next;
    }
    return $array;
}

function queueAssertEqual($expected, $list)
{
    assertEqual($expected, implode(',', queueToArray($list)));
}
