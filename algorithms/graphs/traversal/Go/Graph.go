package main

import "fmt"

// Graph represents a directed graph using an adjency list
type Graph struct {
	vertices map[int]*Vertex
}

// Vertex represents a vertex in the graph
type Vertex struct {
	key   int
	edges map[int]*Vertex
}

// AddVertex adds a new vertex in the graph
func (g *Graph) AddVertex(key int) {
	g.vertices[key] = newVertex(key)
}

// AddEdge add a new edge between two vertices
func (g *Graph) AddEdge(from, to int) {
	g.vertices[from].edges[to] = g.vertices[to]
}

// GetVertex returns a vertex by key
func (g *Graph) GetVertex(search int) *Vertex {
	for key, vertex := range g.vertices {
		if key == search {
			return vertex
		}
	}
	return nil
}

// Print displays the content of the graph
func (g *Graph) Print() {
	for key, vertex := range g.vertices {
		fmt.Println()
		fmt.Printf("%v -> ", key)
		edges := vertex.edges
		for _, edge := range edges {
			fmt.Printf("%v ", edge.key)
		}
	}
	fmt.Println()
}

// NewGraph creates a new Graph
func NewGraph() Graph {
	return Graph{vertices: make(map[int]*Vertex)}
}

func newVertex(key int) *Vertex {
	return &Vertex{key: key, edges: make(map[int]*Vertex)}
}
