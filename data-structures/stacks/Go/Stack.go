package main

import (
	"fmt"
)

type StackNode struct {
	data int
	next *StackNode
}

type Stack struct {
	top *StackNode
}

func (stack *Stack) push(data int) {
	stack.top = &StackNode{data, stack.top}
}

func (stack *Stack) pop() int {
	if stack.top == nil {
		return -1
	}

	top := stack.top.data
	stack.top = stack.top.next
	return top
}

func (stack *Stack) peek() int {
	if stack.top == nil {
		return -1
	}

	return stack.top.data
}

func (stack *Stack) isEmpty() bool {
	return stack.top == nil
}

func (stack *Stack) display() {
	if stack.top == nil {
		fmt.Println("[]")
	}

	current := stack.top
	fmt.Println("[")
	for current != nil {
		fmt.Printf("\t%d\n", current.data)
		current = current.next
	}
	fmt.Println("]")
}

func main() {
	// Create stack
	stack := Stack{}
	stack.display()

	// Push
	fmt.Println("---------- Push ----------")
	stack.push(42)
	stack.display()

	stack.push(51)
	stack.display()

	stack.push(11)
	stack.push(455)
	stack.display()

	// Pop
	fmt.Println("---------- Pop ----------")
	stack = Stack{}
	pop := stack.pop()
	fmt.Printf("pop: %d\n", pop)

	stack.push(42)
	stack.push(51)
	stack.push(11)
	stack.push(455)

	pop = stack.pop()
	fmt.Printf("pop: %d\n", pop)

	pop = stack.pop()
	fmt.Printf("pop: %d\n", pop)

	pop = stack.pop()
	fmt.Printf("pop: %d\n", pop)

	pop = stack.pop()
	fmt.Printf("pop: %d\n", pop)

	pop = stack.pop()
	fmt.Printf("pop: %d\n", pop)

	// Peek
	fmt.Println("---------- Peek ----------")
	stack = Stack{}
	peek := stack.peek()
	fmt.Printf("peek: %d\n", peek)

	stack.push(42)
	stack.push(51)

	peek = stack.peek()
	fmt.Printf("peek: %d\n", peek)

	// Is empty
	fmt.Println("---------- Is empty ----------")
	stack = Stack{}
	fmt.Println(stack.isEmpty())

	stack.push(42)
	fmt.Println(stack.isEmpty())
}
