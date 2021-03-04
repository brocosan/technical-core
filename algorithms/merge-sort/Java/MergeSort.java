import java.util.Arrays;

public class MergeSort {

    public static int[] mergeSort(int[] array) {
        if (array.length <= 1) {
            return array;
        }
        int mid = array.length / 2;
        int[] left = mergeSort(Arrays.copyOfRange(array, 0, mid));
        int[] right = mergeSort(Arrays.copyOfRange(array, mid, array.length));
        return merge(left, right);
    }

    public static int[] merge(int[] left, int[] right) {
        int[] sorted = new int[left.length + right.length];
        int leftIndex = 0;
        int rightIndex = 0;
        int globalIndex = 0;
        while (leftIndex < left.length && rightIndex < right.length) {
            if (left[leftIndex] < right[rightIndex]) {
                sorted[globalIndex] = left[leftIndex];
                leftIndex++;
            } else {
                sorted[globalIndex] = right[rightIndex];
                rightIndex++;
            }
            globalIndex++;
        }
        while (leftIndex < left.length) {
            sorted[globalIndex] = left[leftIndex];
            leftIndex++;
            globalIndex++;
        }
        while (rightIndex < right.length) {
            sorted[globalIndex] = right[rightIndex];
            rightIndex++;
            globalIndex++;
        }
        return sorted;
    }

    public static void main(String[] args) {
        int[] original = { 11, 21, 12, -4, 3, 100, 1000, 1, 123 };
        int[] sorted = { -4, 1, 3, 11, 12, 21, 100, 123, 1000 };
        int[] merged = mergeSort(original);
        if (!Arrays.equals(merged, sorted)) {
            System.out.printf("got: %s, want: %s", Arrays.toString(original), Arrays.toString(sorted));
        }
    }
}