package main

import (
	"fmt"
)

// Graph represents a directed graph using list
type Graph struct {
	nodes []*GraphNode
}

// GraphNode represents a Vertex
type GraphNode struct {
	data  interface{}
	edges []*GraphNode
}

// AddNode adds a node to the graph
func (g *Graph) AddNode(node *GraphNode) {
	g.nodes = append(g.nodes, node)
}

// AddEdge adds an edge between two nodes
func (g *Graph) AddEdge(node1, node2 *GraphNode) {
	node1.edges = append(node1.edges, node2)
}

// Print displays the content of the graph
func (g *Graph) Print() {
	for i := 0; i < len(g.nodes); i++ {
		fmt.Println()
		fmt.Printf("%v -> ", g.nodes[i].data)
		edges := g.nodes[i].edges
		for j := 0; j < len(edges); j++ {
			fmt.Printf("%v ", edges[j].data)
		}
	}
}

func main() {
	graph := Graph{}

	nodeA := &GraphNode{data: "A"}
	nodeB := &GraphNode{data: "B"}
	nodeC := &GraphNode{data: "C"}

	graph.AddNode(nodeA)
	graph.AddNode(nodeB)
	graph.AddNode(nodeC)

	graph.AddEdge(nodeA, nodeB)
	graph.AddEdge(nodeB, nodeC)
	graph.AddEdge(nodeC, nodeB)
	graph.AddEdge(nodeA, nodeC)
	graph.AddEdge(nodeC, nodeA)

	graph.Print()
}
