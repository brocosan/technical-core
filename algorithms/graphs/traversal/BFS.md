# Breadth-First Search (BFS)
- Visit all the nodes reachable from a given node
- Look at nodes reachable in 0 moves, 1 move, 2 moves, ...
- Be careful to avoid duplicates (mark node as visited)

In summary, we start at the root (or another selected node) and explore each neighbor before going on to any of their children.

## Example of traversal
- Search the **current** location. If this is the destination, **stop searching**.
- Search the **neighbors** of the current location. If any of them are the destination, **stop searching**.
- Search all the **neighbors** of those locations. If any of them are the destination, **stop searching**.
- If there is a route to the destination, you will find it, and always in the fewest number of moves from the origin. If you ever run out of locations to search, you know that the destination cannot be reached.

![bfs](https://upload.wikimedia.org/wikipedia/commons/4/46/Animated_BFS.gif)

## Pseudocode
```pseudocode
v = root node
create a queue Q (FIFO)
mark v as visited and put v into Q 
while Q is non-empty 
    remove the head u of Q
    if u is the goal
        stop searching
    for every neighbors n of u
        if n was not visited before
            mark n as visited
            put n into the queue
```

## Complexity
Time: O(V+E) where V is the number of nodes and E is the number of edges.  
Space: O(V)

## Applications
- Web crawling
- Social networking (e.g. find friends of friends)
- Solving puzzles and games (e.g. Rubik's Cube)
- GPS navigation

## Sources
[[video] MIT course - Breadth-First Search](https://www.youtube.com/watch?v=s-CYnVz-uh4&list=PLUl4u3cNGP61Oq3tWYp6V_F-5jb5L2iHb&index=13)  
