<?php

$counter = $cSwap = 0;
echo "Sorting List<br>\n";

echo "Start List: ".implode(",", $list)."<br>\n";
for ($i = 0; $i < count($list)-1; $i++){
  $mPos = $i;
  for ($j = $i + 1; $j < count($list); $j++){
    $counter++;
    if ($list[$j] < $list[$mPos]){
      $cSwap++;
      $mPos = $j;
    }
  }
  if ($i <> $mPos){
    echo "Tausche Index ".$i." mit ".$mPos."<br>\n";
    $val = $list[$mPos];
    $list[$mPos] = $list[$i];
    $list[$i] = $val;
  }
  echo "Durchgang ".($i+1).": ".implode(",", $list)."<br>\n";
}

echo "Sorting finished: ".implode(",", $list)."<br>\n";
echo "Count loop passages: ".$counter."<br>\n";
echo "Count Swaps: ".$cSwap."<br>\n";

?>
