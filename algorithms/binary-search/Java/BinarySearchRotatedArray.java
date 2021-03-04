import java.util.Arrays;
import java.util.HashMap;
import java.util.Map;

// Solving this LeetCode problem
// https://leetcode.com/problems/search-in-rotated-sorted-array/

public class BinarySearch {

    public static int search(int[] array, int search) {
        int low = 0;
        int high = array.length - 1;
        while (low <= high) {
            int mid = (low + high) / 2;
            if (array[mid] == search) {
                return mid;
            }

            // Left side is sorted
            if (array[low] <= array[mid]) {
                if (search >= array[low] && search < array[mid]) {
                    high = mid - 1;
                } else {
                    low = mid + 1;
                }
            } else {
                if (search > array[mid] && search <= array[high]) {
                    low = mid + 1;
                } else {
                    high = mid - 1;
                }
            }
        }
        return -1;
    }

    public static void main(String[] args) {
        int[] array = { 4, 5, 6, 7, 0, 1, 2 };

        HashMap<Integer, Integer> tests = new HashMap<Integer, Integer>();
        tests.put(4, 0);
        tests.put(2, 6);
        tests.put(5, 1);
        tests.put(7, 3);
        tests.put(42, -1);
        for (Map.Entry m : tests.entrySet()) {
            int result = search(array, (int) m.getKey());
            if (result != (int) m.getValue()) {
                System.out.printf("got: %s, want: %s\n", result, m.getValue());
            }
        }
    }
}