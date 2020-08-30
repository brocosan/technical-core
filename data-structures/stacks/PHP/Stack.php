<?php

include '../../../helpers/PHP/helpers.php';

class StackNode
{
    public $data;
    public $next;

    public function __construct($data, $next)
    {
        $this->data = $data;
        $this->next = $next;
    }
}

class Stack
{
    public $top;

    public function push($data)
    {
        $node = new StackNode($data, $this->top);
        $this->top = $node;
    }

    public function pop()
    {
        if ($this->top === null) {
            return null;
        }

        $top = $this->top->data;
        $this->top = $this->top->next;
        return $top;
    }

    public function top()
    {
        if ($this->top === null) {
            return null;
        }
        
        return $this->top->data;
    }

    public function isEmpty()
    {
        return $this->top === null;
    }

    public function display()
    {
        $node = $this->top;
        $count = 0;

        if ($node !== null) {
            while ($node !== null) {
                println('- Node data: ' . $node->data);
                $node = $node->next;
                $count++;
            }
        }
        println('-- Node count: ' . $count);
        println('');
    }
}

// Create stack
$stack = new Stack();
$stack->display();
stackAssertEqual('', $stack);

// Push
println("---------- Push ----------");
$stack->push(42);
$stack->display();
stackAssertEqual('42', $stack);

$stack->push(51);
$stack->display();
stackAssertEqual('51,42', $stack);

$stack->push(11);
$stack->push(455);
$stack->display();
stackAssertEqual('455,11,51,42', $stack);

// Pop
println("---------- Pop ----------");
$stack = new Stack();
$stack->push(42);
$stack->push(51);
$stack->push(11);
$stack->push(455);

$pop = $stack->pop();
stackAssertEqual('11,51,42', $stack);
assertEqual(455, $pop);

$pop = $stack->pop();
stackAssertEqual('51,42', $stack);
assertEqual(11, $pop);

$pop = $stack->pop();
assertEqual(51, $pop);

$pop = $stack->pop();
assertEqual(42, $pop);

$pop = $stack->pop();
assertEqual(null, $pop);

// Top
println("---------- Top ----------");
$stack = new Stack();
$stack->push(42);
$stack->push(51);

$top = $stack->top();
stackAssertEqual('51,42', $stack);
assertEqual(51, $top);

// Is empty
println("---------- Is empty ----------");
$stack = new Stack();
assertEqual(true, $stack->isEmpty());

$stack->push(42);
assertEqual(false, $stack->isEmpty());
