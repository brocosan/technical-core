class Trie {
    private Node root;
    
    public Trie() {
        root = new Node();
    }
    
    void insert(String word) {
        int wordLength = word.length();
        Node currentNode = root;
        for (int i = 0; i < wordLength; i++) {
            int charIndex = word.charAt(i) - 'a';
            if (currentNode.children[charIndex] == null) {
                currentNode.children[charIndex] = new Node();
            }
            currentNode = currentNode.children[charIndex];
        }
        currentNode.isEnd = true;
    }

    boolean search(String word) {
        int wordLength = word.length();
        Node currentNode = root;
        for (int i = 0; i < wordLength; i++) {
            int charIndex = word.charAt(i) - 'a';
            if (currentNode.children[charIndex] == null) {
                return false;
            }
            currentNode = currentNode.children[charIndex];
        }
        return currentNode.isEnd;
    }
    
    void print() {
        root.print("", 0, false);
    }
    
    class Node {
        private Node[] children;
        private boolean isEnd;
        
        public Node() {
            children = new Node[26];
            isEnd = false;
        }
        
        void print(String word, int level, boolean sameLevel) {
            if (isEnd) {
                System.out.println(word);
            }
            sameLevel = false;
            for (int i = 0; i < 26; i++) {
                if (children[i] != null) {
                    if (sameLevel && word.length() >= 1) {
                        word = word.substring(0, word.length()-1);
                    }
                    sameLevel = true;
                    word = word + (char)(i + 'a');
                    children[i].print(word, level+1, sameLevel);
                }
            }
        }
    }
    
    public static void main(String[ ] args) {
        Trie trie = new Trie();
        String[] words = {
            "car",
            "card",
            "cards",
            "cot",
            "cots",
            "trie",
            "tried",
            "tries",
            "try",
        };
        for (String word : words) {
            trie.insert(word);
        }
        // trie.print();

        for (String word : words) {
            if (!trie.search(word)) {
                System.out.println(word + " > this word should exists in the trie");
            }
        }

        System.out.println(trie.search("java")); // false
        System.out.println(trie.search("carry")); // false
    }
}