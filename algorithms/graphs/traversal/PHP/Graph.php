<?php

class Graph
{
    public $vertices = [];

    public function addVertex($key)
    {
        $this->vertices[$key] = new Vertex($key);
    }

    public function addEdge($from, $to)
    {
        $fromVertex = $this->getVertex($from);
        $toVertex = $this->getVertex($to);
        $fromVertex->edges[$to] = $toVertex;
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
        echo $string . "\n";
    }

    public function getVertex($search)
    {
        foreach ($this->vertices as $vertex) {
            if ($vertex->data == $search) {
                return $vertex;
            }
        }
        return null;
    }

    public function traverseBFS($root)
    {
        $visited = [];
        $visited[] = $root;
        $queue = [];
        $queue[] = $root;
        while (!empty($queue)) {
            $node = array_shift($queue);
            printf("Visit BFS > %s\n", $node->data);
            foreach ($node->edges as $edge) {
                if (!in_array($edge, $visited)) {
                    $visited[] = $edge;
                    $queue[] = $edge;
                }
            }
        }
    }

    public function traverseDFS($root)
    {
        $visited = [];
        $this->dfsRecursive($root, $visited);
    }

    public function dfsRecursive($root, &$visited)
    {
        $visited[$root->data] = true;
        printf("Visit DFS > %s\n", $root->data);
        foreach ($root->edges as $edge) {
            if (!isset($visited[$edge->data])) {
                $this->dfsRecursive($edge, $visited);
            }
        }
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

$graph->addVertex(42);
$graph->addVertex(12);
$graph->addVertex(2);
$graph->addVertex(4);
$graph->addVertex(18);
$graph->addVertex(23);

$graph->addEdge(12, 4);
$graph->addEdge(12, 2);
$graph->addEdge(4, 23);
$graph->addEdge(4, 18);
$graph->addEdge(4, 2);
$graph->addEdge(2, 18);
$graph->addEdge(2, 4);
$graph->addEdge(18, 4);
$graph->addEdge(18, 2);
$graph->addEdge(18, 23);
$graph->addEdge(23, 4);

$graph->print();

echo "\n";
$graph->traverseBFS($graph->getVertex(12));

echo "\n";
$graph->traverseDFS($graph->getVertex(12));
