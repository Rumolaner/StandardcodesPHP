<?php

function teile(&$list, $links, $rechts){
  echo "Links - Rechts: ".$links." - ".$rechts."<br>\n";
  $i = $links;
  $j = $rechts - 1;
  $pivot = $list[$rechts];

  while ($i < $j){
    while ($i < $j && $list[$i] <= $pivot){
      $i++;
    }

    while ($j > $i && $list[$j] > $pivot){
      $j--;
    }

    if ($list[$i] > $list[$j]){
      $temp = $list[$i];
      $list[$i] = $list[$j];
      $list[$j] = $temp;
    }
  }

  echo "Pivot: ".$pivot."<br>\n";
  echo "Element i: ".$list[$i]."<br>\n";

  if ($list[$i] > $pivot){
    $temp = $list[$i];
    $list[$i] = $list[$rechts];
    $list[$rechts] = $temp;
  } else {
    $i = $rechts;
  }

  echo "Return index: ".$i."<br>\n";
  echo "Soting interim result: ".implode(",", $list)."<br>\n";

  return $i;
}

function quicksort(&$list, $links, $rechts){
  if ($links < $rechts){
    $teiler = teile($list, $links, $rechts);
    quicksort($list, $links, $teiler - 1);
    quicksort($list, $teiler, $rechts);
  }
}

quicksort($list, 0, count($list)-1);

echo "Sorting finished: ".implode(",", $list)."<br>\n";

?>
