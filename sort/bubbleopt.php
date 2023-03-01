<?php

$counter = $cSwap = 0;
$i = count($list);
echo "Sorting List<br>\n";
do {
  $swapped = false;
  for ($j = 0; $j < $i-1; ++$j) {
    if ($list[$j] > $list[$j+1]) {
      echo "J > J-1 --> Swap<br>\n";
      $temp = $list[$j];
      $list[$j] = $list[$j+1];
      $list[$j+1] = $temp;
      $swapped = true;
      $cSwap++;
    }
    $counter++;
  }
  $i--;
} while ($swapped);
echo "Sorting finished: ".implode(",", $list)."<br>\n";
echo "Count loop passages: ".$counter."<br>\n";
echo "Count Swaps: ".$cSwap."<br>\n";

?>
