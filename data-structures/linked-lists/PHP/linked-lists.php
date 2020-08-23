<?php

include '../../../helpers/PHP/helpers.php';

class Node
{
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList
{
    public $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function display()
    {
        $node = $this->head;
        $count = 0;
        while ($node !== null) {
            println('- Node data: ' . $node->data);
            $node = $node->next;
            $count++;
        }
        println('-- Node count: ' . $count);
        println('');
    }

    public function insert($data)
    {
        $node = $this->head;
        
        if ($node === null) {
            $this->head = new Node($data);
            return true;
        }
        
        while ($node->next !== null) {
            $node = $node->next;
        }
        $node->next = new Node($data);
    }

    public function delete($data)
    {
        $node = $this->head;

        // Empty list
        if ($node === null) {
            return false;
        }

        // Head should be deleted
        if ($node->data === $data) {
            if ($node->next === null) {
                $this->head = null;
            } else {
                $this->head = $node->next;
            }
            return true;
        }
        
        // Search for the value
        $parent = $node;
        while ($node !== null) {
            if ($node->data === $data) {
                $parent->next = $node->next;
                return true;
            }
            $parent = $node;
            $node = $node->next;
        }

        return false;
    }
}

//======================================================================
// TESTS
//======================================================================
// Create linked list
$linkedList = new LinkedList();

// Print empty list
$linkedList->display();
linkedListAssertEqual('', $linkedList);

// Insert nodes
println("---------- INSERTS ----------");
$linkedList->insert(42);
$linkedList->display();
linkedListAssertEqual('42', $linkedList);
$linkedList->insert(51);
$linkedList->display();
linkedListAssertEqual('42,51', $linkedList);

// Delete a node
println("---------- DELETES ----------");
$linkedList->delete(42);
linkedListAssertEqual('51', $linkedList);
$linkedList->delete(51);
linkedListAssertEqual('', $linkedList);

$linkedList->insert(1);
$linkedList->insert(2);
$linkedList->insert(3);
$linkedList->delete(2);
linkedListAssertEqual('1,3', $linkedList);
