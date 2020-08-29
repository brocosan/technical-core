// "static void main" must be defined in a public class.
public class SinglyLinkedList {
    public class Node {
        int data;
        Node next = null;

        public Node(int data) {
            this.data = data;
        }
    }

    Node head;

    public void append(int data) {
        if (head == null) {
            head = new Node(data);
            return;
        }

        Node current = head;
        while (current.next != null) {
            current = current.next;
        }
        current.next = new Node(data);
    }

    public void prepend(int data) {
        Node newHead = new Node(data);
        newHead.next = head;
        head = newHead;
    }

    public void deleteWithValue(int data) {
        if (head == null) {
            return;
        }

        if (head.data == data) {
            head = head.next;
        }

        Node current = head;
        while (current.next != null) {
            if (current.next.data == data) {
                current.next = current.next.next;
                return;
            }
            current = current.next;
        }
    }

    public void display() {
        Node current = head;

        if(head == null) {
            System.out.println("[]");
            return;
        }

        System.out.println("[");
        while(current != null) {
            System.out.println("\t" + current.data);
            current = current.next;
        }
        System.out.println("]");
    }

    public static void main(String[] args) {
        // Create list
        SinglyLinkedList list = new SinglyLinkedList();
        list.display();

        // Append
        System.out.println("---------- Append ----------");
        list.append(42);
        list.display();

        list.append(51);
        list.display();

        list.append(11);
        list.append(455);
        list.display();

        // Prepend
        list = new SinglyLinkedList();
        System.out.println("---------- Prepend ----------");
        list.prepend(42);
        list.display();

        list.prepend(51);
        list.display();

        list.prepend(11);
        list.prepend(455);
        list.display();

        // Delete with value
        list = new SinglyLinkedList();
        System.out.println("---------- Delete with value ----------");
        list.append(42);
        list.append(51);
        list.append(11);
        list.append(455);

        list.deleteWithValue(11);
        list.display();

        list.deleteWithValue(455);
        list.display();

        list.deleteWithValue(42);
        list.display();
    }
}
