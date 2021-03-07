import java.util.HashSet;
import java.util.Queue;
import java.util.LinkedList;

public class Graph {
    public HashSet<Vertex> vertices;

    public Graph() {
        vertices = new HashSet<Vertex>();
    }

    public void addVertex(int key) {
        vertices.add(new Vertex(key));
    }

    public void addEdge(int from, int to) {
        Vertex fromVertex = getVertex(from);
        Vertex toVertex = getVertex(to);
        fromVertex.edges.add(toVertex);
    }

    public Vertex getVertex(int search) {
        for (Vertex vertex : vertices) {
            if (vertex.data == search) {
                return vertex;
            }
        }
        return null;
    }

    public void print() {
        String s = "";
        for (Vertex vertex : vertices) {
            s += "\n" + vertex.data + " -> ";
            for (Vertex edge : vertex.edges) {
                s += edge.data + " ";
            }
        }
        System.out.println(s);
    }

    public void traverseBFS(Vertex root) {
        HashSet<Vertex> visited = new HashSet<Vertex>();
        visited.add(root);
        Queue<Vertex> queue = new LinkedList<>();
        queue.add(root);

        while (!queue.isEmpty()) {
            Vertex vertex = queue.poll();
            System.out.println("Visit BFS > " + vertex.data);
            for (Vertex edge : vertex.edges) {
                if (!visited.contains(edge)) {
                    visited.add(edge);
                    queue.add(edge);
                }
            }
        }
    }

    public void traverseDFS(Vertex root) {
        HashSet<Vertex> visited = new HashSet<Vertex>();
        dfsRecursive(root, visited);
    }

    public void dfsRecursive(Vertex root, HashSet<Vertex> visited) {
        visited.add(root);
        System.out.println("Visit DFS > " + root.data);
        for (Vertex edge : root.edges) {
            if (!visited.contains(edge)) {
                dfsRecursive(edge, visited);
            }
        }
    }

    public class Vertex {
        public int data;
        public HashSet<Vertex> edges;

        public Vertex(int value) {
            edges = new HashSet<Vertex>();
            data = value;
        }
    }

    public static void main(String[] args) {
        Graph graph = new Graph();

        graph.addVertex(42);
        graph.addVertex(12);
        graph.addVertex(2);
        graph.addVertex(4);
        graph.addVertex(18);
        graph.addVertex(23);

        graph.addEdge(12, 4);
        graph.addEdge(12, 2);
        graph.addEdge(4, 23);
        graph.addEdge(4, 18);
        graph.addEdge(4, 2);
        graph.addEdge(2, 18);
        graph.addEdge(2, 4);
        graph.addEdge(18, 4);
        graph.addEdge(18, 2);
        graph.addEdge(18, 23);
        graph.addEdge(23, 4);

        graph.print();

        System.out.println();
        graph.traverseBFS(graph.getVertex(12));

        System.out.println();
        graph.traverseDFS(graph.getVertex(12));
    }
}
