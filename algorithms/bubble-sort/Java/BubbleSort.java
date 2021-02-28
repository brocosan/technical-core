import java.util.Arrays;

public class BubbleSort {

    public static void bubbleSort(int array[]) {
        int arrayLength = array.length - 1;
        boolean isSorted = false;
        while (!isSorted) {
            isSorted = true;
            for (int i = 0; i < arrayLength; i++) {
                if (array[i] > array[i + 1]) {
                    int tmp = array[i];
                    array[i] = array[i + 1];
                    array[i + 1] = tmp;
                    isSorted = false;
                }
            }
        }
    }

    public static void main(String[] args) {
        int[] original = { 11, 21, 12, -4, 3, 100, 1000, 1, 123 };
        int[] sorted = { -4, 1, 3, 11, 12, 21, 100, 123, 1000 };
        bubbleSort(original);
        if (!Arrays.equals(original, sorted)) {
            System.out.printf("got: %s, want: %s", Arrays.toString(original), Arrays.toString(sorted));
        }
    }
}