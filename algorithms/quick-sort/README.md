# Quick sort

## Description
Uses a divide and conquer methodology like [merge sort](../merge-sort/).  
It works by selecting a 'pivot' element from the array and partitioning the other elements into two sub-arrays, according to whether they are less than or greater than the pivot. The sub-arrays are then sorted recursively.  
Here, we will chose the last element as the pivot.

![Quick sort](https://res.cloudinary.com/practicaldev/image/fetch/s--K2JsE6oV--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_880/https://dev-to-uploads.s3.amazonaws.com/i/0t2kg7w5li3eugosxwt9.png)

## Complexity
Runtime: O(n log(n)) on average and O(n^2) in the worst case (low probability)  
Memory: O(log (n))

## Implementations
- [PHP](./PHP)
- [Go](./Go)
- [Java](./Java)

## Resources
[https://www.youtube.com/watch?v=SLauY6PpjW4](https://www.youtube.com/watch?v=SLauY6PpjW4)