# Queues
## Description
Very similar to stacks except they have a FIFO (first-in, first-out) data structure.  
Elements enter from the “back” and leave from the “front.”.
Keep addresses of front and rear of the queue.

Operations:
- enqueue() — Inserts an element to the end of the queue
- dequeue() — Removes an element from the start of the queue
- top() — Returns the first element of the queue
- isEmpty() — Returns true if queue is empty

There are two ways to implement a queue:
- Using array
- Using linked list

&nbsp;

![Queue](https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Data_Queue.svg/1920px-Data_Queue.svg.png)

## Complexity
### Time Complexity
Constant time O(1)

### Space Complexity
O(n)

## Implementations
- [PHP](./PHP)
- [Go](./Go)
- [Java](./Java)
