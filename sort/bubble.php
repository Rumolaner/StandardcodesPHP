<?php

$counter = $cSwap = 0;
echo "Sorting List<br>\n";
for ($i = count($list); $i > 1; --$i) {
  for ($j = 0; $j < $i-1; ++$j) {
    if ($list[$j] > $list[$j+1]) {
      echo "J > J+1 --> Swap<br>\n";
      $temp = $list[$j];
      $list[$j] = $list[$j+1];
      $list[$j+1] = $temp;
      $cSwap++;
    }
    $counter++;
  }
}
echo "Sorting finished: ".implode(",", $list)."<br>\n";
echo "Count loop passages: ".$counter."<br>\n";
echo "Count Swaps: ".$cSwap."<br>\n";

?>
