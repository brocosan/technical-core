<?php

// Graph represents a directed graph using list
class Graph
{
    public $vertices = [];

    public function addVertex($vertex)
    {
        $this->vertices[] = $vertex;
    }

    public function addEdge($vertex1, $vertex2)
    {
        $vertex1->edges[] = $vertex2;
    }

    public function print()
    {
        $string = '';
        foreach ($this->vertices as $vertex) {
            $string .= "\n" . $vertex->data . ' -> ';
            foreach ($vertex->edges as $edge) {
                $string .= $edge->data . " ";
            }
        }
        echo $string;
    }
}

class Vertex
{
    public $data;
    public $edges = [];

    public function __construct($data)
    {
        $this->data = $data;
    }
}

$graph = new Graph();

$vertexA = new Vertex("A");
$vertexB = new Vertex("B");
$vertexC = new Vertex("C");

$graph->addVertex($vertexA);
$graph->addVertex($vertexB);
$graph->addVertex($vertexC);

$graph->addEdge($vertexA, $vertexB);
$graph->addEdge($vertexB, $vertexC);
$graph->addEdge($vertexC, $vertexB);
$graph->addEdge($vertexC, $vertexA);
$graph->addEdge($vertexA, $vertexC);

$graph->print();
