<?php

function heapify(&$list, $parent, $length){
  GLOBAL $cSwap, $counter;
  $counter++;
  $lchild = $parent * 2 + 1;
  $rchild = $lchild + 1;

  echo "Parent: ".$parent."<br>\n";
  echo "LChild: ".$lchild."<br>\n";
  echo "RChild: ".$rchild."<br>\n";

  if ($rchild < $length && $list[$rchild] > $list[$lchild]){
    $tchild = $rchild;
  } elseif ($lchild < $length) {
    $tchild = $lchild;
  } else {
    $tchild = -1;
  }

  if ($tchild > -1 && $list[$parent] < $list[$tchild]){
    echo "Tausche ".$parent." mit ".$tchild." (".$list[$parent]."/".$list[$tchild].")<br>\n";
    $cSwap++;
    $val = $list[$parent];
    $list[$parent] = $list[$tchild];
    $list[$tchild] = $val;

    heapify($list, $tchild, $length);
  }
}

function heapsort(&$list){
  GLOBAL $cSwap;
  echo "HEAPIFY<br>\n";
  for ($pos = (int)(count($list)/2); $pos > 0; $pos--){
    echo "Pos: ".$pos."<br>\n";
    heapify($list, $pos-1, count($list));
  }
  echo "Sorting List: ".implode(",", $list)."<br>\n";

  echo "SORTING<br>\n";
  for ($i = count($list)-1; $i > 0; $i--){
    echo "Durchlauf: ".(20-$i)."<br>\n";
    echo "Tausche 0 mit ".$i." (".$list[0]."/".$list[$i].")<br>\n";
    $cSwap++;
    $val = $list[0];
    $list[0] = $list[$i];
    $list[$i] = $val;
    heapify($list, 0, $i);
    echo "Sorting List: ".implode(",", $list)."<br>\n";
  }
}

echo "Sorting List: ".implode(",", $list)."<br>\n";

$counter = 0;
$cSwap = 0;
heapsort($list);

echo "Sorting finished: ".implode(",", $list)."<br>\n";
echo "Count loop passages: ".$counter."<br>\n";
echo "Count Swaps: ".$cSwap."<br>\n";

?>
