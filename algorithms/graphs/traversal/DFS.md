# Depth-First Search (DFS)
The algorithm starts at the root node (selecting some arbitrary node as the root node in the case of a graph) and explores as far as possible along each branch before backtracking.  
Be careful to avoid duplicates (mark node as visited)

![dfs](https://i.imgur.com/NUmbSSl.gif)

## Pseudocode
Input: A graph G and a vertex v of G 
```pseudocode
procedure DFS(G, v) is
    label v as discovered
    for all directed edges from v to w that are in G.adjacentEdges(v) do
        if vertex w is not labeled as discovered then
            recursively call DFS(G, w)
```

## Complexity 
Time: O(V+E) where V is the number of nodes and E is the number of edges.  
Space: O(V)

## Applications
- Cycle detection
- Solving puzzles with only one solution, such as mazes
- Topological sort

## Sources
[[video] MIT course - Depth-First Search](https://www.youtube.com/watch?v=AfSk24UTFS8)  
