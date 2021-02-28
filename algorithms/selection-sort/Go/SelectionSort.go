package main

import (
	"fmt"
	"reflect"
)

func selectionSort(array []int) {
	arrayLength := len(array)
	for i := 0; i < arrayLength; i++ {
		min := i
		for j := i + 1; j < arrayLength; j++ {
			if array[j] < array[min] {
				min = j
			}
		}
		if min != i {
			array[min], array[i] = array[i], array[min]
		}
	}
}

func main() {
	original := []int{11, 21, 12, -4, 3, 100, 1000, 1, 123}
	sorted := []int{-4, 1, 3, 11, 12, 21, 100, 123, 1000}
	selectionSort(original)
	if !reflect.DeepEqual(original, sorted) {
		fmt.Printf("got: %v, want: %v", original, sorted)
	}
}
