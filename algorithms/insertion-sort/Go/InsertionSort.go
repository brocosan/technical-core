package main

import (
	"fmt"
	"reflect"
)

func insertionSort(arr []int) {
	for i := 1; i < len(arr); i++ {
		key := arr[i]
		j := i - 1
		for ; j >= 0 && arr[j] > key; j-- {
			arr[j+1] = arr[j]
		}
		arr[j+1] = key
	}
}

func main() {
	original := []int{11, 21, 12, -4, 3, 100, 1000, 1, 123}
	sorted := []int{-4, 1, 3, 11, 12, 21, 100, 123, 1000}
	insertionSort(original)
	if !reflect.DeepEqual(original, sorted) {
		fmt.Printf("got: %v, want: %v", original, sorted)
	}
}
