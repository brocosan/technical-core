package main

import (
	"fmt"
	"reflect"
)

func quickSort(array []int) []int {
	arrayLength := len(array)
	if arrayLength <= 1 {
		return array
	}
	pivot := array[arrayLength-1]
	lowPart := make([]int, 0)
	highPart := make([]int, 0)
	for i := 0; i < arrayLength-1; i++ {
		if array[i] < pivot {
			lowPart = append(lowPart, array[i])
		} else {
			highPart = append(highPart, array[i])
		}
	}
	lowPart = quickSort(lowPart)
	highPart = quickSort(highPart)
	return append(append(lowPart, pivot), highPart...)
}

func main() {
	original := []int{11, 21, 12, -4, 3, 100, 1000, 1, 123}
	wanted := []int{-4, 1, 3, 11, 12, 21, 100, 123, 1000}
	sorted := quickSort(original)
	if !reflect.DeepEqual(sorted, wanted) {
		fmt.Printf("got: %v, want: %v", sorted, wanted)
	}
}
