import java.util.Arrays;
import java.util.HashMap;
import java.util.Map;

public class BinarySearch {

    public static int binarySearch(int[] array, int search) {
        int low = 0;
        int high = array.length - 1;
        while (low <= high) {
            int mid = (low + high) / 2;
            if (array[mid] == search) {
                return mid;
            }
            if (array[mid] < search) {
                low = mid + 1;
            } else {
                high = mid - 1;
            }
        }
        return -1;
    }

    public static void main(String[] args) {
        int[] array = { 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 };

        HashMap<Integer, Integer> tests = new HashMap<Integer, Integer>();
        tests.put(1, 0);
        tests.put(5, 4);
        tests.put(42, -1);
        tests.put(10, 9);
        for (Map.Entry m : tests.entrySet()) {
            int result = binarySearch(array, (int) m.getKey());
            if (result != (int) m.getValue()) {
                System.out.printf("got: %s, want: %s\n", result, m.getValue());
            }
        }
    }
}