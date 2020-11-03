# Heaps
## Description
Complete binary tree.  
We have two types of heaps: **max heap** and **min heap**.

For **max heap**, the largest key is stored in the root node.  
Every parent have a higher key than their children.  
Getting the largest key is very fast since we know its position (root).  

For **min heap**, the smallest key is stored in the root node.  
Every parent have a smaller key than their children.  

## Representation
We use arrays to represent this data structure. Each element (node) can be accessed with an index.  
Child indexes can be calculated with the parent index:
- parent index x 2 + 1 = index of left child
- parent index x 2 + 2 = index of right child

## Insert
Note: for max heap  

1. Add the new key at the bottom right of the tree. In array, it will be the last index.
2. Compare the new node with its parent node and swap it if the new node is higher.
3. Keep repeating this process until the new node find its place.

This process is called **Heapify**.

## Extract
Note: for max heap  

To extract the highest we can just take out the root because the highest key is always the root.  
After that we need to rearrange the nodes while maintaining the heap property.  

1. Fill the root node with the last node
2. Start the swapping process starting from the top
    1. Compare the parent with its children
    2. Swap the parent with its larger child
    3. Repeat

## Complexity
On average, heaps operations have logarithmic times.  
Getting the min or max element (for min and max heap) is constant O(1).

### Time Complexity
| Access    | Search    | Insertion | Deletion  |
| :-------: | :-------: | :-------: | :-------: |
| O(logn)   | O(logn)   | O(logn)   | O(logn)   |

### Space Complexity
O(n)

## Implementations
- [PHP](./PHP)
- [Go](./Go)
- [Java](./Java)

## Resources
[[VIDEO] Explanation and implementation in Go](https://www.youtube.com/watch?v=3DYIgTC4T1o)  
[[VIDEO] Explanation and implementation in Java](https://www.youtube.com/watch?v=t0Cq6tVNRBA)