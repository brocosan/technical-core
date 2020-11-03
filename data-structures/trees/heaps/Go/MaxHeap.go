package main

import (
	"fmt"
)

// MaxHeap struct has a slice used as an array
type MaxHeap struct {
	array []int
}

// Insert adds an element to the heap
func (h *MaxHeap) Insert(key int) {
	h.array = append(h.array, key)
	h.heapifyUp()
}

// Extract returns the largest key, and removes it from the heap
func (h *MaxHeap) Extract() int {
	size := len(h.array) - 1

	if size == -1 {
		return -1
	}

	root := h.array[0]

	h.array[0] = h.array[size]
	h.array = h.array[:size]

	h.heapifyDown()

	return root
}

func (h *MaxHeap) heapifyUp() {
	index := len(h.array) - 1
	for h.array[index] > h.array[parent(index)] {
		h.swap(index, parent(index))
		index = parent(index)
	}
}

func (h *MaxHeap) heapifyDown() {
	index := 0
	lastIndex := len(h.array) - 1
	leftIndex, rightIndex := left(index), right(index)
	childToCompare := 0

	// loop while index has at least one child
	for leftIndex <= lastIndex {
		if leftIndex == lastIndex { // when left child is the only child
			childToCompare = leftIndex
		} else if h.array[leftIndex] > h.array[rightIndex] { // when left child is larger
			childToCompare = leftIndex
		} else { // when right child is larger
			childToCompare = rightIndex
		}
		// compare array value of current index to larger child and swap if smaller
		if h.array[index] < h.array[childToCompare] {
			h.swap(index, childToCompare)
			index = childToCompare
			leftIndex, rightIndex = left(index), right(index)
		} else {
			return
		}
	}
}

// swap keys in the array
func (h *MaxHeap) swap(index1, index2 int) {
	h.array[index1], h.array[index2] = h.array[index2], h.array[index1]
}

// get the parent index
func parent(index int) int {
	return (index - 1) / 2
}

// get the left child index
func left(index int) int {
	return 2*index + 1
}

// get the right child index
func right(index int) int {
	return 2*index + 2
}

func main() {
	// The tree will look like this:
	//       50
	//     /    \
	//   34      48
	//  /  \    /
	// 8   16  14
	//
	// In array representation: [50 34 48 8 16 14]

	heap := &MaxHeap{}
	heap.Insert(8)
	heap.Insert(14)
	heap.Insert(16)
	heap.Insert(34)
	heap.Insert(48)
	heap.Insert(50)
	// fmt.Println(heap)

	top := heap.Extract()
	fmt.Println(top)  // 50
	fmt.Println(heap) // [48 34 14 8 16]

	top = heap.Extract()
	fmt.Println(top)  // 48
	fmt.Println(heap) // [34 16 14 8]

	top = heap.Extract()
	fmt.Println(top)  // 34
	fmt.Println(heap) // [16 8 14]

	top = heap.Extract()
	fmt.Println(top)  // 16
	fmt.Println(heap) // [14 8]

	top = heap.Extract()
	fmt.Println(top)  // 14
	fmt.Println(heap) // [8]

	top = heap.Extract()
	fmt.Println(top)  // 8
	fmt.Println(heap) // []

	top = heap.Extract()
	fmt.Println(top)  // -1
	fmt.Println(heap) // []
}
