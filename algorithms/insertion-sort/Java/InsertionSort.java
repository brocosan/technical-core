import java.util.Arrays;

public class InsertionSort {

    public static void insertionSort(int array[]) {
        for (int i = 1; i < array.length; i++) {
            int key = array[i];
            int j = i - 1;
            while (j >= 0 && array[j] > key) {
                array[j + 1] = array[j];
                j--;
            }
            array[j + 1] = key;
        }
    }

    public static void main(String[] args) {
        int[] original = { 11, 21, 12, -4, 3, 100, 1000, 1, 123 };
        int[] sorted = { -4, 1, 3, 11, 12, 21, 100, 123, 1000 };
        insertionSort(original);
        if (!Arrays.equals(original, sorted)) {
            System.out.printf("got: %s, want: %s", Arrays.toString(original), Arrays.toString(sorted));
        }
    }
}