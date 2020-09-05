<?php

include '../../../helpers/PHP/helpers.php';

class QueueNode
{
    public $data;
    public $next = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class Queue
{
    public $head;
    public $tail;

    public function enqueue($data)
    {
        $node = new QueueNode($data);

        if ($this->tail !== null) {
            $this->tail->next = $node;
        }

        $this->tail = $node;

        if ($this->head === null) {
            $this->head = $node;
        }
    }

    public function dequeue()
    {
        if ($this->head === null) {
            return null;
        }

        $head = $this->head->data;
        $this->head = $this->head->next;
        return $head;
    }

    public function top()
    {
        if ($this->head === null) {
            return null;
        }

        return $this->head->data;
    }

    public function isEmpty()
    {
        return $this->head === null;
    }

    public function display()
    {
        $current = $this->head;
        $count = 0;
        while ($current !== null) {
            println('- Node data: ' . $current->data);
            $current = $current->next;
            $count++;
        }
        println('-- Node count: ' . $count);
        println('');
    }
}

// Create queue
$queue = new Queue();
$queue->display();
queueAssertEqual('', $queue);

// Enqueue
println("---------- Enqueue ----------");
$queue->enqueue(42);
$queue->display();
queueAssertEqual('42', $queue);

$queue->enqueue(51);
$queue->display();
queueAssertEqual('42,51', $queue);

$queue->enqueue(11);
$queue->enqueue(455);
$queue->display();
queueAssertEqual('42,51,11,455', $queue);

// Dequeue
println("---------- Dequeue ----------");
$queue = new Queue();
$dequeue = $queue->dequeue();
queueAssertEqual('', $queue);
assertEqual(null, $dequeue);

$queue->enqueue(42);
$queue->enqueue(51);
$queue->enqueue(11);
$queue->enqueue(455);

$dequeue = $queue->dequeue();
queueAssertEqual('51,11,455', $queue);
assertEqual(42, $dequeue);

$dequeue = $queue->dequeue();
queueAssertEqual('11,455', $queue);
assertEqual(51, $dequeue);

$dequeue = $queue->dequeue();
assertEqual(11, $dequeue);

$dequeue = $queue->dequeue();
assertEqual(455, $dequeue);

$dequeue = $queue->dequeue();
assertEqual(null, $dequeue);

// Top
println("---------- Top ----------");
$queue = new Queue();
$queue->enqueue(42);
$queue->enqueue(51);

$top = $queue->top();
queueAssertEqual('42,51', $queue);
assertEqual(42, $top);

// Is empty
println("---------- Is empty ----------");
$queue = new Queue();
assertEqual(true, $queue->isEmpty());

$queue->enqueue(42);
assertEqual(false, $queue->isEmpty());
