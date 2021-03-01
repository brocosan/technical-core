# Linear search

It sequentially checks each element of the list until a match is found or the whole list has been searched.

In the worst case the target value is a the last position. This gives us a complexity of O(n).

```go
func linearSearch(arr []int, target int) int {
    for i, v := range arr {
        if v == target {
            return i
        }
    }
    return -1
}
```

It is used when the list is not ordered or on small datasets.