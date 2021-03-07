package main

import (
	"fmt"
)

func (g Graph) traverseDFS(root *Vertex) {
	visited := make(map[*Vertex]bool)
	g.dfsRecursive(root, visited)
}

func (g Graph) dfsRecursive(root *Vertex, visited map[*Vertex]bool) {
	visited[root] = true
	fmt.Println("Visit > ", root)
	for _, edge := range root.edges {
		if !visited[edge] {
			g.dfsRecursive(edge, visited)
		}
	}
}

func main() {
	graph := NewGraph()

	graph.AddVertex(42)
	graph.AddVertex(12)
	graph.AddVertex(2)
	graph.AddVertex(4)
	graph.AddVertex(18)
	graph.AddVertex(23)

	graph.AddEdge(12, 4)
	graph.AddEdge(12, 2)
	graph.AddEdge(4, 23)
	graph.AddEdge(4, 18)
	graph.AddEdge(4, 2)
	graph.AddEdge(2, 18)
	graph.AddEdge(2, 4)
	graph.AddEdge(18, 4)
	graph.AddEdge(18, 2)
	graph.AddEdge(18, 23)
	graph.AddEdge(23, 4)

	graph.Print()
	graph.traverseDFS(graph.GetVertex(12))
}
