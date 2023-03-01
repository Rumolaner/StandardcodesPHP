<?php

function merge($llist, $rlist){
  echo "LList: ".implode(",", $llist)."<br>\n";
  echo "RList: ".implode(",", $rlist)."<br>\n";

  $nlist = Array();
  while (count($llist) > 0 && count($rlist) > 0) {
    if ($llist[0] <= $rlist[0]){
      array_push($nlist, $llist[0]);
      array_shift($llist);
    } else {
      array_push($nlist, $rlist[0]);
      array_shift($rlist);
    }
  }

  while (count($llist) > 0) {
    array_push($nlist, $llist[0]);
    array_shift($llist);
  }

  while (count($rlist) > 0) {
    array_push($nlist, $rlist[0]);
    array_shift($rlist);
  }

  echo "Soting interim result: ".implode(",", $nlist)."<br>\n";
  return $nlist;
}

function mergesort($list){
  if (count($list) <= 1) {
    return $list;
  } else {
    $llist = array_slice($list, 0, floor(count($list) / 2));
    $rlist = array_slice($list, floor(count($list) / 2));

    $llist = mergesort($llist);
    $rlist = mergesort($rlist);

    return merge($llist, $rlist);
  }
}

$list = mergesort($list);

echo "Sorting finished: ".implode(",", $list)."<br>\n";
//echo "Count loop passages: ".$counter."<br>\n";
//echo "Count Swaps: ".$cSwap."<br>\n";

?>
