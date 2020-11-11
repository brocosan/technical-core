<?php

class Trie
{
    public $root;
    
    public function __construct()
    {
        $this->root = new Node();
    }
    
    public function insert($word)
    {
        $wordLength = strlen($word);
        $currentNode = $this->root;
        for ($i = 0; $i < $wordLength; $i++) {
            $nodeIndex = ord($word[$i]) - ord('a');
            if (is_null($currentNode->children[$nodeIndex])) {
                $currentNode->children[$nodeIndex] = new Node();
            }
            $currentNode = $currentNode->children[$nodeIndex];
        }
        $currentNode->isEnd = true;
    }

    public function search($word)
    {
        $wordLength = strlen($word);
        $currentNode = $this->root;
        for ($i = 0; $i < $wordLength; $i++) {
            $nodeIndex = ord($word[$i]) - ord('a');
            if (is_null($currentNode->children[$nodeIndex])) {
                return false;
            }
            $currentNode = $currentNode->children[$nodeIndex];
        }
        if ($currentNode->isEnd) {
            return true;
        }
        return false;
    }
    
    public function print()
    {
        $this->root->print("", 0, false);
    }
}

class Node
{
    public $children;
    public $isEnd;
    
    public function __construct()
    {
        $this->isEnd = false;
        $this->children = array_fill(0, 26, null);
    }
    
    public function print($word, $level, $sameLevel)
    {
        if ($this->isEnd) {
            var_dump($word);
        }
        $sameLevel = false;
        for ($i = 0; $i < 26; $i++) {
            if (!is_null($this->children[$i])) {
                if ($sameLevel && strlen($word) >= 1) {
                    $word = substr($word, 0, -1);
                }
                $sameLevel = true;
                $word .= chr($i + ord('a'));
                $this->children[$i]->print($word, $level+1, $sameLevel);
            }
        }
    }
}

$trie = new Trie();

$words = [
    "car",
    "card",
    "cards",
    "cot",
    "cots",
    "trie",
    "tried",
    "tries",
    "try",
];

foreach ($words as $word) {
    $trie->insert($word);
}

// $trie->print();

foreach ($words as $word) {
    if (!$trie->search($word)) {
        die($word . " > this word should exists in the trie");
    }
}
var_dump($trie->search("php")); // false
var_dump($trie->search("care")); // false
