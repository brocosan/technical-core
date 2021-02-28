package main

import (
	"fmt"
	"reflect"
)

func mergeSort(array []int) []int {
	if len(array) <= 1 {
		return array
	}
	mid := len(array) / 2
	left := mergeSort(array[:mid])
	right := mergeSort(array[mid:])
	return merge(left, right)
}

func merge(left, right []int) []int {
	var sorted = []int{}
	var leftIndex = 0
	var rightIndex = 0

	for leftIndex < len(left) && rightIndex < len(right) {
		if left[leftIndex] < right[rightIndex] {
			sorted = append(sorted, left[leftIndex])
			leftIndex++
		} else {
			sorted = append(sorted, right[rightIndex])
			rightIndex++
		}
	}

	for leftIndex < len(left) {
		sorted = append(sorted, left[leftIndex])
		leftIndex++
	}

	for rightIndex < len(right) {
		sorted = append(sorted, right[rightIndex])
		rightIndex++
	}

	return sorted
}

func main() {
	original := []int{11, 21, 12, -4, 3, 100, 1000, 1, 123}
	wanted := []int{-4, 1, 3, 11, 12, 21, 100, 123, 1000}
	sorted := mergeSort(original)
	if !reflect.DeepEqual(sorted, wanted) {
		fmt.Printf("got: %v, want: %v", sorted, wanted)
	}
}
