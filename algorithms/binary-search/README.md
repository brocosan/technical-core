# Binary search

## Description
It works by comparing the middle element of a sorted array to the target element. If the values are the same, the index of the element will be returned. If not, the list will be cut in half.

If the target value were less than the middle value, the new list would be the left half. If the target value were greater than the middle value, the new list would be the right half.

This process continues until we find the target value or the list is empty.

![Binary search](https://i.imgur.com/fTOlnTl.jpg)

## Complexity
Runtime: O(log n)  
Memory: O(1)

## Implementations
- [PHP](./PHP)
- [Go](./Go)
- [Java](./Java)

## Resources
[https://www.youtube.com/watch?v=6ysjqCUv3K4](https://www.youtube.com/watch?v=6ysjqCUv3K4)