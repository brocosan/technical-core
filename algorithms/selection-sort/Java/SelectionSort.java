import java.util.Arrays;

public class SelectionSort {

    public static void selectionSort(int array[]) {
        int arrayLength = array.length;
        for (int i = 0; i < arrayLength; i++) {
            int min = i;
            for (int j = i + 1; j < arrayLength; j++) {
                if (array[j] < array[min]) {
                    min = j;
                }
            }
            if (min != i) {
                int tmp = array[i];
                array[i] = array[min];
                array[min] = tmp;
            }
        }
    }

    public static void main(String[] args) {
        int[] original = { 11, 21, 12, -4, 3, 100, 1000, 1, 123 };
        int[] sorted = { -4, 1, 3, 11, 12, 21, 100, 123, 1000 };
        selectionSort(original);
        if (!Arrays.equals(original, sorted)) {
            System.out.printf("got: %s, want: %s", Arrays.toString(original), Arrays.toString(sorted));
        }
    }
}