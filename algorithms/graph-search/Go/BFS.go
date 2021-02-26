package main

import "fmt"

// Graph represents a directed graph using list
type Graph struct {
	vertices map[string]*Vertex
}

// Vertex represents a vertex in the graph
type Vertex struct {
	id    string
	edges map[string]*Vertex
}

// AddVertex adds a new vertex in the graph
func (g *Graph) AddVertex(vertex *Vertex) {
	g.vertices[vertex.id] = vertex
}

// AddEdge add a new edge between two vertices
func (v *Vertex) AddEdge(edge *Vertex) {
	v.edges[edge.id] = edge
}

// Print displays the content of the graph
func (g *Graph) Print() {
	for id, vertex := range g.vertices {
		fmt.Println()
		fmt.Printf("%v -> ", id)
		edges := vertex.edges
		for _, edge := range edges {
			fmt.Printf("%v ", edge.id)
		}
	}
}

func newGraph() Graph {
	return Graph{vertices: make(map[string]*Vertex)}
}

func newVertex(id string) *Vertex {
	return &Vertex{id: id, edges: make(map[string]*Vertex)}
}

func main() {
	graph := newGraph()

	vertexA := newVertex("A")
	vertexB := newVertex("B")
	vertexC := newVertex("C")
	vertexD := newVertex("D")
	vertexE := newVertex("E")
	vertexF := newVertex("F")
	vertexG := newVertex("G")
	vertexH := newVertex("H")

	graph.AddVertex(vertexA)
	graph.AddVertex(vertexB)
	graph.AddVertex(vertexC)
	graph.AddVertex(vertexD)
	graph.AddVertex(vertexE)
	graph.AddVertex(vertexF)
	graph.AddVertex(vertexG)
	graph.AddVertex(vertexH)

	vertexA.AddEdge(vertexB)
	vertexA.AddEdge(vertexC)
	vertexB.AddEdge(vertexD)
	vertexB.AddEdge(vertexE)
	vertexE.AddEdge(vertexH)
	vertexC.AddEdge(vertexF)
	vertexC.AddEdge(vertexG)

	graph.Print()
}
