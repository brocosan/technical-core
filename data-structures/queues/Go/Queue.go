package main

import (
	"fmt"
)

type QueueNode struct {
	data int
	next *QueueNode
}

type Queue struct {
	head *QueueNode
	tail *QueueNode
}

func (queue *Queue) enqueue(data int) {
	node := &QueueNode{data, nil}

	if queue.tail != nil {
		queue.tail.next = node
	}

	queue.tail = node

	if queue.isEmpty() {
		queue.head = node
	}
}

func (queue *Queue) dequeue() int {
	if queue.isEmpty() {
		return -1
	}

	head := queue.head.data
	queue.head = queue.head.next
	if queue.isEmpty() {
		queue.tail = nil
	}
	return head
}

func (queue *Queue) peek() int {
	if queue.isEmpty() {
		return -1
	}

	return queue.head.data
}

func (queue *Queue) isEmpty() bool {
	return queue.head == nil
}

func (queue *Queue) display() {
	if queue.isEmpty() {
		fmt.Println("[]")
	}

	current := queue.head
	fmt.Println("[")
	for current != nil {
		fmt.Printf("\t%d\n", current.data)
		current = current.next
	}
	fmt.Println("]")
}

func main() {
	// Create queue
	queue := Queue{}
	queue.display()

	// Enqueue
	fmt.Println("---------- Enqueue ----------")
	queue.enqueue(42)
	queue.display()

	queue.enqueue(51)
	queue.display()

	queue.enqueue(11)
	queue.enqueue(455)
	queue.display()

	// Dequeue
	fmt.Println("---------- Dequeue ----------")
	queue = Queue{}
	dequeue := queue.dequeue()
	fmt.Printf("dequeue: %d\n", dequeue)

	queue.enqueue(42)
	queue.enqueue(51)
	queue.enqueue(11)
	queue.enqueue(455)

	dequeue = queue.dequeue()
	fmt.Printf("dequeue: %d\n", dequeue)

	dequeue = queue.dequeue()
	fmt.Printf("dequeue: %d\n", dequeue)

	dequeue = queue.dequeue()
	fmt.Printf("dequeue: %d\n", dequeue)

	dequeue = queue.dequeue()
	fmt.Printf("dequeue: %d\n", dequeue)

	dequeue = queue.dequeue()
	fmt.Printf("dequeue: %d\n", dequeue)

	// Peek
	fmt.Println("---------- Peek ----------")
	queue = Queue{}
	peek := queue.peek()
	fmt.Printf("peek: %d\n", peek)

	queue.enqueue(42)
	queue.enqueue(51)

	peek = queue.peek()
	fmt.Printf("peek: %d\n", peek)

	// Is empty
	fmt.Println("---------- Is empty ----------")
	queue = Queue{}
	fmt.Println(queue.isEmpty())

	queue.enqueue(42)
	fmt.Println(queue.isEmpty())
}
