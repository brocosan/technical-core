public class Stack {
    private class StackNode {
        private int data;
        private StackNode next;

        private StackNode(int data, StackNode next) {
            this.data = data;
            this.next = next;
        }
    }

    private StackNode top;

    public void push(int data) {
        StackNode node = new StackNode(data, top);
        top = node;
    }

    public int pop() {
        if (top == null) {
            return -1;
        }

        int data = top.data;
        top = top.next;
        return data;
    }

    public int top() {
        if (top == null) {
            return -1;
        }

        return top.data;
    }

    public boolean isEmpty() {
        return top == null;
    }

    public void display() {
        if (top == null) {
            System.out.println("[]");
            return;
        }

        StackNode current = top;
        System.out.println("[");
        while (current != null) {
            System.out.println("\t" + current.data);
            current = current.next;
        }
        System.out.println("]");
    } 

    public static void main(String[] args) {
        // Create stack
        Stack stack = new Stack();
        stack.display();

        // Push
        System.out.println("---------- Push ----------");
        stack.push(42);
        stack.display();

        stack.push(51);
        stack.display();

        stack.push(11);
        stack.push(455);
        stack.display();

        // Pop
        System.out.println("---------- Pop ----------");
        stack = new Stack();
        int pop = stack.pop();
        System.out.println("pop: " + pop);

        stack.push(42);
        stack.push(51);
        stack.push(11);
        stack.push(455);

        pop = stack.pop();
        System.out.println("pop: " + pop);

        pop = stack.pop();
        System.out.println("pop: " + pop);

        pop = stack.pop();
        System.out.println("pop: " + pop);

        pop = stack.pop();
        System.out.println("pop: " + pop);

        pop = stack.pop();
        System.out.println("pop: " + pop);

        // Top
        System.out.println("---------- Top ----------");
        stack = new Stack();
        int top = stack.top();
        System.out.println("top: " + top);

        stack.push(42);
        stack.push(51);

        top = stack.top();
        System.out.println("top: " + top);

        // Is empty
        System.out.println("---------- Is empty ----------");
        stack = new Stack();
        System.out.println(stack.isEmpty());

        stack.push(42);
        System.out.println(stack.isEmpty());
    }
}