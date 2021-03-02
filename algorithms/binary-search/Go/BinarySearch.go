package main

import "fmt"

func binarySearch(array []int, search int) int {
	low := 0
	high := len(array) - 1
	for low <= high {
		mid := (low + high) / 2
		if array[mid] == search {
			return mid
		}
		if array[mid] < search {
			low = mid + 1
		} else {
			high = mid - 1
		}
	}
	return -1
}

func main() {
	array := []int{1, 2, 3, 4, 5, 6, 7, 8, 9, 10}

	tests := []struct {
		search int
		wanted int
	}{
		{1, 0},
		{5, 4},
		{42, -1},
		{10, 9},
	}
	for _, tt := range tests {
		result := binarySearch(array, tt.search)
		if result != tt.wanted {
			fmt.Printf("got: %v, want: %v\n", result, tt.wanted)
		}
	}

}
