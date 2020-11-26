import java.util.HashSet;

// Graph represents a directed graph using list
public class Graph {
    public HashSet<Node> nodes;

    public Graph() {
        nodes = new HashSet<Node>();
    }

    public void addNode(Node node) {
        nodes.add(node);
    }

    public void addEdge(Node nodeA, Node nodeB) {
        nodeA.edges.add(nodeB);
    }

    public void print() {
        String s = "";
        for (Node node : nodes) {
            s += "\n" + node.data + " -> ";
            for (Node edge : node.edges) {
                s += edge.data + " ";
            }
        }
        System.out.println(s);
    }

    public static void main(String[] args) {
        Graph graph = new Graph();

        Node nodeA = new Node("A");
        Node nodeB = new Node("B");
        Node nodeC = new Node("C");

        graph.addNode(nodeA);
        graph.addNode(nodeB);
        graph.addNode(nodeC);

        graph.addEdge(nodeA, nodeB);
        graph.addEdge(nodeB, nodeC);
        graph.addEdge(nodeC, nodeB);
        graph.addEdge(nodeA, nodeC);
        graph.addEdge(nodeC, nodeA);

        graph.print();
    }
}
