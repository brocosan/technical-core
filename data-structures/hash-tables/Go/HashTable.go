package main

import (
	"fmt"
)

//ArraySize is the size of the hash table array
const ArraySize = 5

// HashTable holds an array of buckets
type HashTable struct {
	array [ArraySize]*bucket
}

type bucket struct {
	head *bucketNode
}

type bucketNode struct {
	key   string
	value interface{}
	next  *bucketNode
}

// Insert puts data in the hash table
func (h *HashTable) Insert(key string, value interface{}) {
	index := index(key)
	if h.array[index] == nil {
		h.array[index] = &bucket{}
	}
	h.array[index].insert(key, value)
}

// Search looks for a key in the hash table
func (h *HashTable) Search(key string) bool {
	index := index(key)
	if h.array[index] != nil {
		currentNode := h.array[index].head
		for currentNode != nil {
			if currentNode.key == key {
				return true
			}
			currentNode = currentNode.next
		}
	}
	return false
}

// Delete remove a key from the hash table
func (h *HashTable) Delete(key string) {
	index := index(key)
	if h.array[index] == nil || h.array[index].head == nil {
		return
	}

	if h.array[index].head.key == key {
		h.array[index].head = h.array[index].head.next
		return
	}

	currentNode := h.array[index].head
	for currentNode.next != nil {
		if currentNode.next.key == key {
			currentNode.next = currentNode.next.next
			return
		}
		currentNode = currentNode.next
	}
}

func (b *bucket) insert(key string, value interface{}) {
	newNode := &bucketNode{key, value, nil}
	if b.head != nil {
		newNode.next = b.head
	}
	b.head = newNode
}

// hash and return the index
func index(key string) int {
	index := 0
	for _, v := range key {
		index += int(v)
	}
	return index % ArraySize
}

func main() {
	hashTable := HashTable{}
	hashTable.Insert("firstname", "john") // index: 4
	hashTable.Insert("lastname", "doe")   // index: 3
	hashTable.Insert("language", "go")    // index: 1
	hashTable.Insert("inserted", true)    // index: 2
	hashTable.Insert("age", 42)           // index: 1

	if hashTable.array[1].head.next.value != "go" {
		panic("The value should be go")
	}
	if hashTable.array[1].head.value != 42 {
		panic("The value should be 42")
	}
	if hashTable.array[2].head.value != true {
		panic("The value should be true")
	}
	if hashTable.array[3].head.value != "doe" {
		panic("The value should be doe")
	}
	if hashTable.array[4].head.value != "john" {
		panic("The value should be john")
	}

	keys := []string{
		"firstname", "lastname", "language", "inserted", "age",
	}
	notKeys := []string{
		"deleted", "updated", "id",
	}
	for _, v := range keys {
		if !hashTable.Search(v) {
			panic(fmt.Sprintf("The key '%s' should be found", v))
		}
	}
	for _, v := range notKeys {
		if hashTable.Search(v) {
			panic(fmt.Sprintf("The key '%s' should not be found", v))
		}
	}

	hashTable.Delete("unknown")
	for _, v := range keys {
		hashTable.Delete(v)
		if hashTable.Search(v) {
			panic(fmt.Sprintf("The key '%s' should be deleted", v))
		}
	}
}
