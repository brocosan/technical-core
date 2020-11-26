import java.util.HashSet;

public class Node {
    public String data;
    public HashSet<Node> edges;

    public Node(String value) {
        edges = new HashSet<Node>();
        data = value;
    }
}
