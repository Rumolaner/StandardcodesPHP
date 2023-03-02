<?php

$found = false;

echo "Suchbereich der Tiefensuche ist keine Liste, sondern ein Baum. Deshalb wird die übergebene Liste nur zum Teil verwendet um einen Demo-Baum erstellt<br>\n";
echo "Searching for ".$search."<br>\n";

class Node{
  public $value;
  public $visited = false;
  public $neighbors = [];

  function __construct($val){
    echo "Erstelle Knoten mit Wert: ".$val."<br>\n";
    $this->value = $val;
  }

  function addNeighbor($neighbor){
    echo "Verbinde Knoten ".$this->value." mit Knoten ".$neighbor->value."<br>\n";
    $this->neighbors[] = $neighbor;
    $neighbor->neighbors[] = $this;
  }
}

function dfs($node, $search){
  echo "Durchlaufe jetzt Knoten ".$node->value."<br>\n";
  $node->visited = true;
  if ($node->value == $search){
    echo "Gesuchten Knoten gefunden: ".$node->value."<br>\n";
    return $node;
  }

  foreach($node->neighbors as $neighbor){
    echo "Durchlaufe jetzt die direkten Nachbarn des Knotens<br>\n";
    if (!$neighbor->visited){
      echo "Nachbar ".$neighbor->value." wurde noch nicht durchlaufen<br>\n";
      $result = dfs($neighbor, $search);
      if ($result != null){
        return $result;
      }
    }else{
      echo "Nachbar ".$neighbor->value." wurde schon durchlaufen<br>\n";
    }
  }
  return null;
}

$node1 = new Node($list[0]);
$node2 = new Node($list[1]);
$node3 = new Node($list[2]);
$node4 = new Node($list[3]);
$node5 = new Node($list[4]);
$node6 = new Node($list[5]);
$node7 = new Node($list[6]);
$node8 = new Node($list[7]);
$node9 = new Node($list[8]);
$node10 = new Node($list[9]);

$node1->addNeighbor($node2);
$node1->addNeighbor($node3);
$node1->addNeighbor($node4);
$node2->addNeighbor($node5);
$node2->addNeighbor($node6);
$node3->addNeighbor($node7);
$node4->addNeighbor($node8);
$node4->addNeighbor($node9);
$node5->addNeighbor($node10);

$node = dfs($node1, $search);

if ($node == NULL)
  echo "Suchwert wurde nicht gefunden!<br>\n";
else
  echo "Gefundener Knoten: ".$node->value."<br>\n";

?>
