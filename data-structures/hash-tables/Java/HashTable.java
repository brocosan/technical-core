class HashTable {
    private static int ARRAY_SIZE = 5;
    private Bucket[] array = new Bucket[ARRAY_SIZE];

    class Bucket {
        private BucketNode head;

        void insert(String key, String value) {
            BucketNode newNode = new BucketNode(key, value, null);
            if (head != null) {
                newNode.next = head;
            }
            head = newNode;
        }
    }

    class BucketNode {
        private String key;
        private String value;
        private BucketNode next;

        public BucketNode(String key, String value, BucketNode next) {
            this.key = key;
            this.value = value;
            this.next = next;
        }
    }

    void insert(String key, String value) {
        int index = index(key);
        if (array[index] == null) {
            array[index] = new Bucket();
        }
        array[index].insert(key, value);
    }

    boolean search(String key) {
        int index = index(key);
        if (array[index] == null) {
            return false;
        }

        if (array[index].head.key == key) {
            return true;
        }

        BucketNode currentNode = array[index].head;
        while (currentNode != null) {
            if (currentNode.key == key) {
                return true;
            }
            currentNode = currentNode.next;
        }
        return false;
    }

    void delete(String key) {
        int index = index(key);
        if (array[index] == null) {
            return;
        }

        if (array[index].head.key == key) {
            array[index].head = array[index].head.next;
            return;
        }

        BucketNode currentNode = array[index].head;
        while (currentNode.next != null) {
            if (currentNode.next.key == key) {
                currentNode.next = currentNode.next.next;
                return;
            }
            currentNode = currentNode.next;
        }
    }

    int index(String key) {
        int hash = 0;
        for (char c : key.toCharArray()) {
            hash += (c - 'a');

        }
        return hash % ARRAY_SIZE;
    }

    public static void main(String[] args) {
        HashTable hashTable = new HashTable();
        hashTable.insert("firstname", "john"); // index: 1
        hashTable.insert("lastname", "doe"); // index: 2
        hashTable.insert("language", "java"); // index: 0
        hashTable.insert("inserted", "true"); // index: 1
        hashTable.insert("age", "42"); // index: 0

        String[] keys = { "firstname", "lastname", "language", "inserted", "age" };
        String[] notKeys = { "deleted", "updated", "id" };
        for (String word : keys) {
            if (!hashTable.search(word)) {
                System.out.println("The key '" + word + "' should be found");
            }
        }
        for (String word : notKeys) {
            if (hashTable.search(word)) {
                System.out.println("The key '" + word + "' should not be found");
            }
        }

        hashTable.delete("unknown");
        for (String word : notKeys) {
            hashTable.delete(word);
            if (hashTable.search(word)) {
                System.out.println("The key '" + word + "' should be deleted");
            }
        }
    }
}