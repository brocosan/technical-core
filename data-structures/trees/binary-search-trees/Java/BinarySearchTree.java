class Node {
    int data;
    Node left, right;
    
    public Node(int data) {
        this.data = data;
    }

    public void insert(int data) {
        if (data <= this.data) {
            if (this.left == null) {
                this.left = new Node(data);
            } else {
                this.left.insert(data);
            }
        } else {
            if (this.right == null) {
                this.right = new Node(data);
            } else {
                this.right.insert(data);
            }
        }
    }
    
    public boolean search(int data) {
        if (this.data == data) {
            return true;
        }
        if (data < this.data) {
            if (this.left == null) {
                return false;
            }
            return this.left.search(data);
        } else {
            if (this.right == null) {
                return false;
            }
            return this.right.search(data);
        }
    }

    public void printInOrder() {
        if (this.left != null) {
            this.left.printInOrder();
        }
        System.out.println(this.data);
        if (this.right != null) {
            this.right.printInOrder();
        }
    }

    public void printPreOrder() {
        System.out.println(this.data);
        if (this.left != null) {
            this.left.printPreOrder();
        }
        if (this.right != null) {
            this.right.printPreOrder();
        }
    }

    public void printPostOrder() {
        if (this.left != null) {
            this.left.printPostOrder();
        }
        if (this.right != null) {
            this.right.printPostOrder();
        }
        System.out.println(this.data);
    }

    public static void main(String[] args) {
        Node tree = new Node(10);
        tree.insert(5);
        tree.insert(15);
        tree.insert(8);
        
        // System.out.println(tree.search(10)); // true
        // System.out.println(tree.search(5));  // true
        // System.out.println(tree.search(15)); // true
        // System.out.println(tree.search(8));  // true
        // System.out.println(tree.search(42)); // false
        
        // tree.printInOrder(); // 5, 8, 10, 15
	    // tree.printPreOrder(); // 10, 5, 8, 15
	    // tree.printPostOrder(); // 8, 5, 15, 10
    }
}
