package main

import (
	"fmt"
)

func (g Graph) traverseBFS(root *Vertex) {
	visited := make(map[*Vertex]bool)
	visited[root] = true

	var queue []*Vertex
	queue = append(queue, root)

	for len(queue) > 0 {
		vertex := queue[0]
		queue = queue[1:] // dequeue
		fmt.Println("Visit >", vertex)
		for _, edge := range vertex.edges {
			if !visited[edge] {
				visited[edge] = true
				queue = append(queue, edge)
			}
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
	graph.traverseBFS(graph.GetVertex(12))
}
