package main

import (
	"fmt"
)

// Node is a tree element
type Node struct {
	Data        int
	Left, Right *Node
}

// Insert a node
func (n *Node) Insert(data int) {
	if data <= n.Data {
		if n.Left == nil {
			n.Left = &Node{Data: data}
		} else {
			n.Left.Insert(data)
		}
	} else {
		if n.Right == nil {
			n.Right = &Node{Data: data}
		} else {
			n.Right.Insert(data)
		}
	}
}

// Search a node
func (n *Node) Search(data int) bool {
	if n == nil {
		return false
	}
	if data < n.Data {
		return n.Left.Search(data)
	}
	if data > n.Data {
		return n.Right.Search(data)
	}
	return true
}

// PrintInOrder traverses the tree in order
func (n *Node) PrintInOrder() {
	if n.Left != nil {
		n.Left.PrintInOrder()
	}
	fmt.Println(n.Data)
	if n.Right != nil {
		n.Right.PrintInOrder()
	}
}

// PrintPreOrder traverses the tree in pre order
func (n *Node) PrintPreOrder() {
	fmt.Println(n.Data)
	if n.Left != nil {
		n.Left.PrintPreOrder()
	}
	if n.Right != nil {
		n.Right.PrintPreOrder()
	}
}

// PrintPostOrder traverses the tree in post order
func (n *Node) PrintPostOrder() {
	if n.Left != nil {
		n.Left.PrintPostOrder()
	}
	if n.Right != nil {
		n.Right.PrintPostOrder()
	}
	fmt.Println(n.Data)
}

// Print displays the tree
func (n *Node) Print() {
	left, right := -1, -1
	if n.Left != nil {
		left = n.Left.Data
	}
	if n.Right != nil {
		right = n.Right.Data
	}
	fmt.Printf("%d->(%d, %d) ", n.Data, left, right)
	if n.Left != nil {
		n.Left.Print()
	}
	if n.Right != nil {
		n.Right.Print()
	}
}

func main() {
	tree := Node{Data: 10}
	tree.Insert(5)
	tree.Insert(15)
	tree.Insert(8)
	// tree.Print()

	// The tree looks like this
	// 10->(5, 15) 5->(-1, 8) 8->(-1, -1) 15->(-1, -1)
	//   10
	//  /  \
	// 5    15
	//  \
	//   8

	// fmt.Println(tree.Search(10)) // true
	// fmt.Println(tree.Search(5))  // true
	// fmt.Println(tree.Search(15)) // true
	// fmt.Println(tree.Search(8))  // true
	// fmt.Println(tree.Search(42)) // false

	// tree.PrintInOrder() // 5, 8, 10, 15
	// tree.PrintPreOrder() // 10, 5, 8, 15
	// tree.PrintPostOrder() // 8, 5, 15, 10
}
