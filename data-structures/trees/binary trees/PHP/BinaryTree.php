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

    public function addChildren($left, $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class BinaryTree
{
    public $root;

    public function __construct($node)
    {
        $this->root = $node;
    }

    public function print()
    {
        $this->printNode($this->root, 0);
    }

    public function printNode($node, $level)
    {
        if ($node) {
            echo str_repeat("-", $level);
            echo $node->data . "\n";

            if ($node->left) {
                $this->printNode($node->left, $level + 1);
            }

            if ($node->right) {
                $this->printNode($node->right, $level + 1);
            }
        }
    }
}

$root = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(5);
$node6 = new Node(6);

$tree = new BinaryTree($root);

$root->addChildren($node2, $node3);
$node2->addChildren($node4, $node5);
$node3->addChildren($node6, null);
$tree->print();
