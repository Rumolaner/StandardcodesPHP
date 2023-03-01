<?php

$counter = $cSwap = 0;
echo "Sorting List<br>\n";
for ($i = 1; $i < count($list); $i++) {
  $value = $list[$i];
  $j = $i;
  while ($j > 0 && $list[$j -1] > $value) {
    $list[$j] = $list[$j-1];
    $j--;
    $cSwap++;
  }
  $list[$j] = $value;
  $counter++;
}
echo "Sorting finished: ".implode(",", $list)."<br>\n";
echo "Count loop passages: ".$counter."<br>\n";
echo "Count Swaps: ".$cSwap."<br>\n";

?>
