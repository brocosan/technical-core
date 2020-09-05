public class Queue {
    private class QueueNode {
        private int data;
        private QueueNode next;

        private QueueNode(int data) {
            this.data = data;
        }
    }

    private QueueNode head;
    private QueueNode tail;

    public void enqueue(int data) {
        QueueNode node = new QueueNode(data);
        
        if (tail != null) {
            tail.next = node;
        }
        
        tail = node;

        if (head == null) {
            head = node;
        }
    }

    public int dequeue() {
        if (head == null) {
            return -1;
        }

        int data = head.data;
        head = head.next;
        if (head == null) {
            tail = null;
        }
        return data;
    }

    public int top() {
        if (head == null) {
            return -1;
        }

        return head.data;
    }

    public boolean isEmpty() {
        return head == null;
    }

    public void display() {
        if (head == null) {
            System.out.println("[]");
            return;
        }

        QueueNode current = head;
        System.out.println("[");
        while (current != null) {
            System.out.println("\t" + current.data);
            current = current.next;
        }
        System.out.println("]");
    } 

    public static void main(String[] args) {
        // Create queue
        Queue queue = new Queue();
        queue.display();

        // Enqueue
        System.out.println("---------- Enqueue ----------");
        queue.enqueue(42);
        queue.display();

        queue.enqueue(51);
        queue.display();

        queue.enqueue(11);
        queue.enqueue(455);
        queue.display();

        // Dequeue
        System.out.println("---------- Dequeue ----------");
        queue = new Queue();
        int dequeue = queue.dequeue();
        System.out.println("dequeue: " + dequeue);

        queue.enqueue(42);
        queue.enqueue(51);
        queue.enqueue(11);
        queue.enqueue(455);

        dequeue = queue.dequeue();
        System.out.println("dequeue: " + dequeue);

        dequeue = queue.dequeue();
        System.out.println("dequeue: " + dequeue);

        dequeue = queue.dequeue();
        System.out.println("dequeue: " + dequeue);

        dequeue = queue.dequeue();
        System.out.println("dequeue: " + dequeue);

        dequeue = queue.dequeue();
        System.out.println("dequeue: " + dequeue);

        // Top
        System.out.println("---------- Top ----------");
        queue = new Queue();
        int top = queue.top();
        System.out.println("top: " + top);

        queue.enqueue(42);
        queue.enqueue(51);

        top = queue.top();
        System.out.println("top: " + top);

        // Is empty
        System.out.println("---------- Is empty ----------");
        queue = new Queue();
        System.out.println(queue.isEmpty());

        queue.enqueue(42);
        System.out.println(queue.isEmpty());
    }
}