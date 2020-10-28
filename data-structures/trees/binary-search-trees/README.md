# Binary Search Trees
## Description
Each node can have up to 2 children.
A node can be defined by:
- data
- 2 pointers (left and right node)
  
The left subnode always contains values less than the parent node.  
The right subnode always contains values greater than the parent node. 

## Other types
**Full Binary Trees (strict / proper)**  
Each node have 0 or 2 nodes

**Complete Binary Trees**  
Every level is fully filled except for the last level. All nodes as left as possible.

**Perfect Binary Tree**  
Both full and complete. All leafs are at the same level and this level has the maximum number of nodes.

## Binary Tree Traversal
Order to visit (print) nodes. The most common is in-order.

**In-Order Traversal**  
Left branch, current node, right node.

**Pre-Order Traversal**  
Current node, left node, right node. The root is always the first node visited.

**Post-Order**  
Left node, right node, current node. The root is always the last node visited.

![traversal](https://i.imgur.com/gMIJUU3.png)

## Complexity
On average, Insert, search and deletion operations is O(logn) time where n is the number of nodes in the tree (if balanced).  
If unbalanced, it becomes similar to a linked list.

### Time Complexity (balanced)
| Access    | Search    | Insertion | Deletion  |
| :-------: | :-------: | :-------: | :-------: |
| O(logn)   | O(logn)   | O(logn)   | O(logn)   |

### Time Complexity (unbalanced)
| Access    | Search    | Insertion | Deletion  |
| :-------: | :-------: | :-------: | :-------: |
| O(n)      | O(n)      | O(n)      | O(n)      |

### Space Complexity
O(n)

## Implementations
- [PHP](./PHP)
- [Go](./Go)
- [Java](./Java)

## Resources
[[VIDEO] Explanation and implementation in Go](https://www.youtube.com/watch?v=-oYitelECuQ)  
[[VIDEO] Explanation and implementation in Java](https://www.youtube.com/watch?v=oSWTXtMglKE)