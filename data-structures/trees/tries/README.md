# Heaps
## Description
Type of tree. Each node stores a character.  
Each path down the tree represents a word.  
Also called a prefix tree.  
To indicate a complete word we can use:
- The * node (null node)
- A boolean flag isEnd within the parent node

![tries](https://i.imgur.com/JEpE5Ii.png)

## Application
The most common application for this structure is auto-complete for example the search bar in Google.

## Complexity
### Time Complexity
O(m) for searching  and inserting strings where m is the length of the string.

### Space Complexity
Can take a lot of space. Will grow as we insert longer words.  
Tries are a trade-off between time and space.

## Implementations
- [PHP](./PHP)
- [Go](./Go)
- [Java](./Java)

## Resources
[[VIDEO] Explanation and implementation in Go](https://www.youtube.com/watch?v=nL7BHR5vJDc)  
[[VIDEO] Explanation Cracking the coding interview](https://www.youtube.com/watch?v=zIjfhVPRZCg)