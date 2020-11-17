<?php

class HashTable
{
    const ARRAY_SIZE = 5;
    
    public $array;
    
    public function __construct()
    {
        $this->array = new SplFixedArray(self::ARRAY_SIZE);
    }
    
    public function search($key)
    {
        $index = index($key);
        if ($this->array[$index] == null) {
            return false;
        }
        
        $currentNode = $this->array[$index]->head;
        while ($currentNode != null) {
            if ($currentNode->key == $key) {
                return true;
            }
            $currentNode = $currentNode->next;
        }
        return false;
    }
    
    public function insert($key, $value)
    {
        $index = index($key);
        if ($this->array[$index] == null) {
            $this->array[$index] = new Bucket();
        }
        $this->array[$index]->insert($key, $value);
    }
    
    public function delete($key)
    {
        $index = index($key);
        if ($this->array[$index] == null) {
            return;
        }
        
        if ($this->array[$index]->head->key == $key) {
            $this->array[$index]->head = $this->array[$index]->head->next;
            return;
        }
        
        $currentNode = $this->array[$index]->head;
        while ($currentNode->next != null) {
            if ($currentNode->next->key == $key) {
                $currentNode->next = $currentNode->next->next;
                return;
            }
            $currentNode = $currentNode->next;
        }
        return false;
    }
}

class Bucket
{
    public $head;
    
    public function insert($key, $value)
    {
        $newNode = new BucketNode($key, $value);
        if ($this->head != null) {
            $newNode->next = $this->head;
        }
        $this->head = $newNode;
    }
}

class BucketNode
{
    public $key;
    public $value;
    public $next;
    
    public function __construct($key, $value, $next = null)
    {
        $this->key = $key;
        $this->value = $value;
        $this->next = $next;
    }
}

function index($key)
{
    $hash = 0;
    foreach (str_split($key) as $char) {
        $hash += ord($char);
    }
    return $hash % HashTable::ARRAY_SIZE;
}

$hashTable = new HashTable();

$hashTable->insert("firstname", "john"); // index: 4
$hashTable->insert("lastname", "doe");   // index: 3
$hashTable->insert("language", "go");    // index: 1
$hashTable->insert("inserted", true);    // index: 2
$hashTable->insert("age", 42);           // index: 1

$keys = [
    "firstname", "lastname", "language", "inserted", "age",
];
$notKeys = [
    "deleted", "updated", "id",
];
foreach ($keys as $key) {
    if (!$hashTable->search($key)) {
        var_dump('The key ['.$key.'] should be found');
    }
}
foreach ($notKeys as $key) {
    if ($hashTable->search($key)) {
        var_dump('The key ['.$key.'] should not be found');
    }
}

$hashTable->delete("unknown");
foreach ($keys as $key) {
    $hashTable->delete($key);
    if ($hashTable->search($key)) {
        var_dump('The key ['.$key.'] should not be deleted');
    }
}
