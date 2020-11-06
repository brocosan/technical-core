import java.util.Arrays;

class MaxHeap {
    private int capacity = 6;
    private int size = 0;
    
    int[] array = new int[capacity];
    
    void insert(int key) {
        array[size] = key;
        size++;
        heapifyUp();
    }
    
    int extract() {
        if (size == 0) {
            return -1;
        }
        int root = array[0];
        array[0] = array[size - 1];
        array[size - 1] = 0;
        size--;
        heapifyDown();
        return root;
    }
    
    void heapifyUp() {
        int index = size - 1;
        while (array[index] > array[parent(index)]) {
            swap(index, parent(index));
            index = parent(index);
        }
    }
    
    void heapifyDown() {
        int index = 0;
        int lastIndex = size - 1;
        int leftIndex = left(index);
        int rightIndex = right(index);
        int childToCompare = 0;

        // loop while index has at least one child
        while (leftIndex <= lastIndex) {
            if (leftIndex == lastIndex) { // when left child is the only child
                childToCompare = leftIndex;
            } else if (array[leftIndex] > array[rightIndex]) { // when left child is larger
                childToCompare = leftIndex;
            } else { // when right child is larger
                childToCompare = rightIndex;
            }
            // compare array value of current index to larger child and swap if smaller
            if (array[index] < array[childToCompare]) {
                swap(index, childToCompare);
                index = childToCompare;
                leftIndex = left(index);
                rightIndex = right(index);
            } else {
                return;
            }
        }
    }
    
    // swap keys in the array
    void swap(int index1, int index2) {
        int temp = array[index1];
        array[index1] = array[index2];
        array[index2] = temp;
    }
    
    // get the parent index
    int parent(int index) {
        return (index - 1) / 2;
    }
    
    // get the left child index
    int left(int index) {
        return 2*index + 1;
    }
    
    // get the right child index
    int right(int index) {
        return 2*index + 2;
    }
    
    public static void main(String[ ] args) {
        // The tree will look like this:
        //       50
        //     /    \
        //   34      48
        //  /  \    /
        // 8   16  14
        //
        // In array representation: [50 34 48 8 16 14]
        
        MaxHeap heap = new MaxHeap();
        heap.insert(8);
        heap.insert(14);
        heap.insert(16);
        heap.insert(34);
        heap.insert(48);
        heap.insert(50);
        //System.out.println(Arrays.toString(heap.array));
        
        int top = heap.extract();
    	System.out.println(top);  // 50
    	System.out.println(Arrays.toString(heap.array)); // [48 34 14 8 16]

        top = heap.extract();
        System.out.println(top);  // 48
        System.out.println(Arrays.toString(heap.array)); // [34 16 14 8]

        top = heap.extract();
        System.out.println(top);  // 34
        System.out.println(Arrays.toString(heap.array)); // [16 8 14]

        top = heap.extract();
        System.out.println(top);  // 16
        System.out.println(Arrays.toString(heap.array)); // [14 8]

        top = heap.extract();
        System.out.println(top);  // 14
        System.out.println(Arrays.toString(heap.array)); // [8]

        top = heap.extract();
        System.out.println(top);  // 8
        System.out.println(Arrays.toString(heap.array)); // []

        top = heap.extract();
        System.out.println(top);  // -1
        System.out.println(Arrays.toString(heap.array)); // []
    }
}
