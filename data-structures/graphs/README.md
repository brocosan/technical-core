# Graphs
## Description
Non-linear data structure similar to trees.  
It is composed of a collection of **nodes** which are connected to each other.  
The connections are called **edges** and can be either directed or non-directed.  
The edges can also have weights associated to them. These could represent distances, times or any other kind of information which describes that connection.

&nbsp;

**Directed graph**  
![Graph](https://i.imgur.com/RVluC6A.png)  
The graph is **weighted** if a number (weight) is assigned to each edge.

&nbsp;

**Undirected graph**
![Graph](https://i.imgur.com/xJxVSop.png)  
In the example above, the set of vertices are (12, 2, 4, 18, 23) and the edges are (12-2, 12-4, 2-4, 4-18, 4-23, 18-23, 2-18).

## Representation
There are two common ways to represent a graph.
### Adjacency List
This is the most common way.  
Each vertex stores a list of edges that originate from that vertex.

![list](https://i.imgur.com/i99VG02.png)  
For example, if vertex A has an edge to vertices B, C, and D, then vertex A would have a list containing 3 edges.  

Finding an edge or weight between two vertices can be expensive because there is no random access to edges. You must traverse the adjacency lists until it is found.

### Adjacency Matrix
A matrix with rows and columns representing vertices stores a weight to indicate if vertices are connected and by what weight.

![matrix](https://i.imgur.com/QBPDUrm.png)  
For example, if there is a directed edge of weight 5.6 from vertex A to vertex B, then the entry with row for vertex A and column for vertex B would have the value 5.6.

Adding another vertex to the graph is expensive, because a new matrix structure must be created with enough space to hold the new row/column, and the existing structure must be copied into the new one.

## Complexity
Let *V* be the number of vertices in the graph, and *E* the number of edges.  Then we have:

| Operation       | Adjacency List | Adjacency Matrix |
|-----------------|----------------|------------------|
| Storage Space   | O(V + E)       | O(V^2)           |
| Add Vertex      | O(1)           | O(V^2)           |
| Add Edge        | O(1)           | O(1)             |
| Check Adjacency | O(V)           | O(1)             |

"Checking adjacency" means that we try to determine that a given vertex is an immediate neighbor of another vertex. The time to check adjacency for an adjacency list is **O(V)**, because in the worst case a vertex is connected to *every* other vertex.

In the case of a *sparse* graph, where each vertex is connected to only a handful of other vertices, an adjacency list is the best way to store the edges. If the graph is *dense*, where each vertex is connected to most of the other vertices, then a matrix is preferred.

## Implementations
- [PHP](./PHP)
- [Go](./Go)
- [Java](./Java)
