# Binary Trees
## Description
**Binary Trees**  
Each node can have up to 2 children.
A node can be defined by:
- data
- 2 pointers (left and right node)

![bt](https://www.geeksforgeeks.org/wp-content/uploads/binary-tree-to-DLL.png)

**Full Binary Trees (strict / proper)**  
Each node have 0 or 2 nodes

**Complete Binary Trees**  
Every level is fully filled except for the last level. All nodes as left as possible.

**Perfect Binary Tree**  
Both full and complete. All leafs are at the same level and this level has the maximum number of nodes.

## Binary Tree Traversal
Order to visit (often print) nodes. The most common is in-order.

**In-Order Traversal**  
Left branch, current node, right node.

**Pre-Order Traversal**  
Current node, left node, right node. The root is always the first node visited.

**Post-Order**  
Left node, right node, current node. The root is always the last node visited.