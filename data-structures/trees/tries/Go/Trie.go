package main

import (
	"fmt"
)

// Node represents a node in the trie
type Node struct {
	children [26]*Node
	isEnd    bool
}

// Trie represents a trie and has a pointer to the root node
type Trie struct {
	root *Node
}

// Insert will take in a word and add it to the trie
func (t *Trie) Insert(word string) {
	wordLength := len(word)
	currentNode := t.root
	for i := 0; i < wordLength; i++ {
		charIndex := word[i] - 'a'
		if currentNode.children[charIndex] == nil {
			currentNode.children[charIndex] = &Node{}
		}
		currentNode = currentNode.children[charIndex]
	}
	currentNode.isEnd = true
}

// Search will take in a word and return true is that word is included in the trie
func (t *Trie) Search(word string) bool {
	wordLength := len(word)
	currentNode := t.root
	for i := 0; i < wordLength; i++ {
		charIndex := word[i] - 'a'
		if currentNode.children[charIndex] == nil {
			return false
		}
		currentNode = currentNode.children[charIndex]
	}
	if currentNode.isEnd {
		return true
	}
	return false
}

// Print displays all the words contained in the trie
func (t *Trie) Print() {
	t.root.print("", 0, false)
}

func (n *Node) print(word string, level int, sameLevel bool) {
	if n.isEnd {
		fmt.Println(word)
	}
	sameLevel = false
	for i := 0; i < 26; i++ {
		if n.children[i] != nil {
			if sameLevel && len(word) >= 1 {
				word = word[:len(word)-1]
			}
			sameLevel = true
			word += string(rune(i + 'a'))
			n.children[i].print(word, level+1, sameLevel)
		}
	}
}

// InitTrie will create a new trie
func InitTrie() *Trie {
	// Create a new trie with a root node
	return &Trie{root: &Node{}}
}

func main() {
	trie := InitTrie()

	words := []string{
		"car",
		"card",
		"cards",
		"cot",
		"cots",
		"trie",
		"tried",
		"tries",
		"try",
	}

	for _, word := range words {
		trie.Insert(word)
	}
	// trie.Print()

	for _, word := range words {
		if !trie.Search(word) {
			panic("this word should exists in the trie")
		}
	}

	fmt.Println(trie.Search("golang")) // false
	fmt.Println(trie.Search("carry"))  // false
}
