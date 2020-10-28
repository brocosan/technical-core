<?php

class Node
{
    public $data;
    public $left = null;
    public $right = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function insert($data)
    {
        if ($data <= $this->data) {
            if ($this->left == null) {
                $this->left = new Node($data);
            } else {
                $this->left->insert($data);
            }
        } else {
            if ($this->right == null) {
                $this->right = new Node($data);
            } else {
                $this->right->insert($data);
            }
        }
    }

    public function search($data)
    {
        if ($this->data == $data) {
            return true;
        }
        if ($data < $this->data) {
            if ($this->left == null) {
                return false;
            }
            return $this->left->search($data);
        }
        
        if ($this->right == null) {
            return false;
        }
        return $this->right->search($data);
    }

    public function printInOrder()
    {
        if ($this->left !== null) {
            $this->left->printInOrder();
        }
        var_dump($this->data);
        if ($this->right !== null) {
            $this->right->printInOrder();
        }
    }

    public function printPreOrder()
    {
        var_dump($this->data);
        if ($this->left !== null) {
            $this->left->printPreOrder();
        }
        if ($this->right !== null) {
            $this->right->printPreOrder();
        }
    }

    public function printPostOrder()
    {
        if ($this->left !== null) {
            $this->left->printPostOrder();
        }
        if ($this->right !== null) {
            $this->right->printPostOrder();
        }
        var_dump($this->data);
    }
}

$tree = new Node(10);
$tree->insert(5);
$tree->insert(15);
$tree->insert(8);
// var_dump($tree);

// var_dump($tree->search(10)); // true
// var_dump($tree->search(5)); // true
// var_dump($tree->search(15)); // true
// var_dump($tree->search(8)); // true
// var_dump($tree->search(42)); // false

// $tree->printInOrder(); // 5, 8, 10, 15
// $tree->printPreOrder(); // 10, 5, 8, 15
// $tree->printPostOrder(); // 8, 5, 15, 10
