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
TODO

- [PHP](./PHP)
- JavaScript
- Go
- Java
- Python  