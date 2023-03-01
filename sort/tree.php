<?php

$counter = $cSwap = 0;
echo "Sorting List<br>\n";

echo "Start List: ".implode(",", $list)."<br>\n";

class Node {
  public $value;
  public $lnode = null;
  public $rnode = null;

  public function __construct($val){
    echo "Neuer Knoten mit Wert ".$val."<br>\n";
    $this->value = $val;
  }

  public function insert ($depth, $val){
    if ($val <= $this->value){
      echo "Links einfügen<br>\n";
      if ($this->lnode == null){
        echo "Neuer Knoten in Tiefe ".$depth."<br>\n";
        $this->lnode = new Node($val);
      }else{
        echo "Weiterreichen<br>\n";
        $this->lnode->insert($depth+1, $val);
      }
    } else {
      echo "Rechts einfügen<br>\n";
      if ($this->rnode == null){
        echo "Neuer Knoten in Tiefe ".$depth."<br>\n";
        $this->rnode = new Node($val);
      }else{
        echo "Weiterreichen<br>\n";
        $this->rnode->insert($depth+1, $val);
      }
    }
  }

  public function traverse(&$list){
    if ($this->lnode != null){
      $this->lnode->traverse($list);
    }
    $list[] = $this->value;
    if ($this->rnode != null){
      $this->rnode->traverse($list);
    }
  }
}

function TreeSort(&$list){
  $root = new Node($list[0]);
  for ($i = 1; $i < count($list); $i++){
    echo "Suchen nach Platz für Wert: ".$list[$i]."<br>\n";
    $root->insert(1, $list[$i]);
  }

  $root->traverse($array);
  return $array;
}

$list = TreeSort($list);

echo "Sorting finished: ".implode(",", $list)."<br>\n";
echo "Count loop passages: ".$counter."<br>\n";
echo "Count Swaps: ".$cSwap."<br>\n";

?>
