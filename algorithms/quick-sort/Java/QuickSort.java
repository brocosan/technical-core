import java.util.Arrays;
import java.util.List;
import java.util.ArrayList;

public class QuickSort {

    public static int[] quickSort(int[] array) {
        int arrayLength = array.length;
        if (arrayLength <= 1) {
            return array;
        }
        int pivot = array[arrayLength - 1];
        List<Integer> lowPart = new ArrayList<Integer>();
        List<Integer> highPart = new ArrayList<Integer>();

        for (int i = 0; i < arrayLength - 1; i++) {
            if (array[i] < pivot) {
                lowPart.add(array[i]);
            } else {
                highPart.add(array[i]);
            }
        }

        int[] lowSorted = quickSort(listToArray(lowPart));
        int[] highSorted = quickSort(listToArray(highPart));

        int[] concatenatedArray = new int[lowSorted.length + highSorted.length + 1];
        System.arraycopy(lowSorted, 0, concatenatedArray, 0, lowSorted.length);
        System.arraycopy(new int[] { pivot }, 0, concatenatedArray, lowSorted.length, 1);
        System.arraycopy(highSorted, 0, concatenatedArray, lowSorted.length + 1, highSorted.length);
        return concatenatedArray;
    }

    public static int[] listToArray(List<Integer> list) {
        return list.stream().mapToInt(i -> i).toArray();
    }

    public static void main(String[] args) {
        int[] original = { 11, 21, 12, -4, 3, 100, 1000, 1, 123 };
        int[] wanted = { -4, 1, 3, 11, 12, 21, 100, 123, 1000 };
        int[] sorted = quickSort(original);
        if (!Arrays.equals(sorted, wanted)) {
            System.out.printf("got: %s, want: %s", Arrays.toString(sorted), Arrays.toString(wanted));
        }
    }
}