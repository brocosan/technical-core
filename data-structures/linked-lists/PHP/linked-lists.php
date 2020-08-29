<?php

include '../../../helpers/PHP/helpers.php';

class Node
{
    public $data;
    public $next = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class LinkedList
{
    public $head = null;

    public function append($data)
    {
        if ($this->head === null) {
            $this->head = new Node($data);
            return true;
        }
        
        $node = $this->head;
        while ($node->next !== null) {
            $node = $node->next;
        }
        $node->next = new Node($data);
    }

    public function prepend($data)
    {
        $newHead = new Node($data);
        $newHead->next = $this->head;
        $this->head = $newHead;
    }

    public function deleteWithValue($data)
    {
        if ($this->head === null) {
            return false;
        }

        if ($this->head->data === $data) {
            $this->head = $this->head->next;
            return true;
        }

        $node = $this->head;
        while ($node->next !== null) {
            if ($node->next->data === $data) {
                $node->next = $node->next->next;
                return true;
            }
            $node = $node->next;
        }
        return false;
    }

    public function display()
    {
        $node = $this->head;
        $count = 0;

        if ($node !== null) {
            while ($node !== null) {
                println('- Node data: ' . $node->data);
                $node = $node->next;
                $count++;
            }
        }
        println('-- Node count: ' . $count);
        println('');
    }
}

// Create list
$linkedList = new LinkedList();
$linkedList->display();
linkedListAssertEqual('', $linkedList);

// Append
println("---------- Append ----------");
$linkedList->append(42);
$linkedList->display();
linkedListAssertEqual('42', $linkedList);

$linkedList->append(51);
$linkedList->display();
linkedListAssertEqual('42,51', $linkedList);

$linkedList->append(11);
$linkedList->append(455);
$linkedList->display();
linkedListAssertEqual('42,51,11,455', $linkedList);

// Prepend
println("---------- Prepend ----------");
$linkedList = new LinkedList();
$linkedList->prepend(42);
$linkedList->display();
linkedListAssertEqual('42', $linkedList);

$linkedList->prepend(51);
$linkedList->display();
linkedListAssertEqual('51,42', $linkedList);

$linkedList->prepend(11);
$linkedList->prepend(455);
$linkedList->display();
linkedListAssertEqual('455,11,51,42', $linkedList);

// Delete with value
println("---------- Delete with value ----------");
$linkedList = new LinkedList();
$linkedList->append(42);
$linkedList->append(51);
$linkedList->append(11);
$linkedList->append(455);

$linkedList->deleteWithValue(11);
$linkedList->display();
linkedListAssertEqual('42,51,455', $linkedList);

$linkedList->deleteWithValue(455);
$linkedList->display();
linkedListAssertEqual('42,51', $linkedList);

$linkedList->deleteWithValue(42);
$linkedList->display();
linkedListAssertEqual('51', $linkedList);
