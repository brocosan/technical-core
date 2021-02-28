package main

import (
	"fmt"
	"reflect"
)

func bubbleSort(array []int) {
	arrayLength := len(array) - 1
	isSorted := false

	for !isSorted {
		isSorted = true
		for i := 0; i < arrayLength; i++ {
			if array[i] > array[i+1] {
				array[i], array[i+1] = array[i+1], array[i]
				isSorted = false
			}
		}
	}
}

func main() {
	original := []int{11, 21, 12, -4, 3, 100, 1000, 1, 123}
	sorted := []int{-4, 1, 3, 11, 12, 21, 100, 123, 1000}
	bubbleSort(original)
	if !reflect.DeepEqual(original, sorted) {
		fmt.Printf("got: %v, want: %v", original, sorted)
	}
}
