<?php

$found = false;

echo "Searching for ".$search."<br>\n";

function interpol($list, $search){
  $low = 0;
  $high = count($list)-1;

  while($low <= $high && $list[$lo] <= $search && $list[$high] >= $search){
    echo "Low: ".$low." ".$list[$low]."<br>\n";
    echo "High: ".$high." ".$list[$high]."<br>\n";
    echo "High-Low: ".($high-$low)."<br>\n";
    echo "Search - Liste[low]: ".($search-$list[$low])."<br>\n";
    echo "Liste[high] - List[low]: ".($list[$high]-$list[$low])."<br>\n";
    $pos = $low += ($high - $low) * ($search - $list[$low]) / ($list[$high] - $list[$low]);

    echo "Pos: ".$pos." ".$list[$pos]."<br>\n";
    if ($list[$pos] == $search){
      echo "Value found<br>\n";
      return $pos;
    }

    if ($list[$pos] > $search){
      echo "Pos to big<br>\n";
      $high = $pos;
    }

    if ($list[$pos] < $search){
      echo "Pos to big<br>\n";
      $low = $pos;
    }
  }
}

$index = interpol($list, $search);


?>
