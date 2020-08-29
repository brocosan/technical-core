package main

import (
	"fmt"
)

type Node struct {
	data int
	next *Node
}

type LinkedList struct {
	head *Node
}

func (list *LinkedList) append(data int) {
	if list.head == nil {
		list.head = &Node{data, nil}
		return
	}

	current := list.head
	for current.next != nil {
		current = current.next
	}
	current.next = &Node{data, nil}
}

func (list *LinkedList) prepend(data int) {
	list.head = &Node{data, list.head}
}

func (list *LinkedList) deleteWithValue(data int) {
	if list.head == nil {
		return
	}

	if list.head.data == data {
		list.head = list.head.next
	}

	current := list.head
	for current.next != nil {
		if current.next.data == data {
			current.next = current.next.next
			return
		}
		current = current.next
	}
}

func (list *LinkedList) display() {
	if list.head == nil {
		fmt.Println("[]")
		return
	}

	current := list.head
	fmt.Println("[")
	for current != nil {
		fmt.Printf("\t%d\n", current.data)
		current = current.next
	}
	fmt.Println("]")
}

func main() {
	// Create list
	var list LinkedList
	list.display()

	// Append
	fmt.Println("---------- Append ----------")
	list.append(42)
	list.display()

	list.append(51)
	list.display()

	list.append(11)
	list.append(455)
	list.display()

	// Prepend
	list = LinkedList{}
	fmt.Println("---------- Prepend ----------")
	list.prepend(42)
	list.display()

	list.prepend(51)
	list.display()

	list.prepend(11)
	list.prepend(455)
	list.display()

	// Delete with value
	list = LinkedList{}
	fmt.Println("---------- Delete with value ----------")
	list.append(42)
	list.append(51)
	list.append(11)
	list.append(455)

	list.deleteWithValue(11)
	list.display()

	list.deleteWithValue(455)
	list.display()

	list.deleteWithValue(42)
	list.display()
}
