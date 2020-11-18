# Linked lists
## Description
Linear data structure in which elements are not stored in sequential memory locations. Elements are linked using pointers.  
Each node contains a value and a pointer to the next node in the list.  
&nbsp;  
Unlike arrays, linked lists do not have indexes, so you must start at the first node and traverse through each node until you get to the nth node. At the end, the last node will point to a null value.  
&nbsp;  
The first node is called the head, and the last node is called the tail.
&nbsp;  
A linked list has a number of useful applications:
- Implement stacks, queues, and hash tables
- Create directories
- Dynamic memory allocation
- Offers constant time O(1) for add/remove from the beginning

![Linked List](https://upload.wikimedia.org/wikipedia/commons/6/6d/Singly-linked-list.svg)

## Complexity
### Time Complexity
| Access    | Search    | Insertion | Deletion  |
| :-------: | :-------: | :-------: | :-------: |
| O(n)      | O(n)      | O(1)      | O(n)      |

### Space Complexity
O(n)

## Implementations
- [PHP](./PHP)
- [Go](./Go)
- [Java](./Java)

## Possible functions
- size() - returns number of data elements in list
- empty() - bool returns true if empty
- value_at(index) - returns the value of the nth item (starting at 0 for first)
- prepend(value) - adds an item to the front of the list
- pop_front() - remove front item and return its value
- append(value) - adds an item at the end
- pop_back() - removes end item and returns its value
- front() - get value of front item
- back() - get value of end item
- insert(index, value) - insert value at index, so current item at that index is pointed to by new item at index
- erase(index) - removes node at given index
- value_n_from_end(n) - returns the value of the node at nth position from the end of the list
- reverse() - reverses the list
- delete_with_value(value) - removes the first item in the list with this value

## Resources
[[VIDEO] Explanation and implementation in Go (part 1)](https://www.youtube.com/watch?v=1S0_-VxPLJo)  
[[VIDEO] Explanation and implementation in Go (part 1)](https://www.youtube.com/watch?v=8QoynPUY9_8)  
[[VIDEO] Explanation and implementation in Java](https://www.youtube.com/watch?v=njTh_OwMljA)