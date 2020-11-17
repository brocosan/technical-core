# Hash Tables
## Description
Associative arrays. Use keys to map values instead of using an index.  
Offers the benefits of the combination of arrays and linked lists.  
Excellent for quick storage and retrieval of data based on key-value pairs. 

### Hash
A hash table must use a hash function to compute an index.  
The hash function converts a key into an index that stores the data.  

Primary requirements for a good hash function:
- Deterministic: Equal keys produce equal values.
- Efficiency: It should be O(1) in time.
- Uniform distribution: It makes the most use of the array.

Example of hash:  
- Grab the number value for each character and add those up.
- Mod the sum by the length of the array (sum of ASCII codes % n)

This is a simplified version, the hashing function in modern systems are more complicated.

### Collisions
Collisions may occur with the calculation of the hash.  
instead of storing the values in the array, each array slot will hold a pointer to a linked list holding all the values that hash to that index.

&nbsp;

![hash table](https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Hash_table_5_0_1_1_1_1_0_LL.svg/1920px-Hash_table_5_0_1_1_1_1_0_LL.svg.png)

## Complexity
### Time Complexity (average)
On average, the time complexity is constant.  
In the worst case, all keys collides with each other resulting in the hash tables becoming a simple linked list. The complexity will be O(n).

| Search    | Insertion | Deletion  |
| :-------: | :-------: | :-------: |
| O(1)      | O(1)      | O(1)      |

### Space Complexity
O(n)

## Implementations
- [PHP](./PHP)
- [Go](./Go)
- [Java](./Java)