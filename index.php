<?php

if ($argc > 0){
  echo "Modus: Konsole<br>\n";
  echo "Argumentenreihenfolge: Suchwert Suchalgorithmus Sortieralgorithmus Suchliste<br>\n";
  $modus = 1;
} elseif (count($_REQUEST) > 0){
  echo "Modus: Browser<br>\n";
  $modus = 2;
  echo "Argumentenübergabe: s=Suchwert st=Suchalgorithmus sort=Sortieralgorithmus list=Suchliste<br>\n";
} else{
  echo "Aufruf ohne Parameter<br>\n";
  $modus = 0;
}

if ($modus == 1){
  if ($argc > 1)
    $search = $argv[1];
  else
    $search = "32";

  if ($argc > 2)
    $search_type = $argv[2];
  else
    $search_type = "linear";

  if($argc > 3)
    $sort = $argv[3];
  else
    $sort = "bubble";

  if ($argc > 4)
    $list = explode(",", $argv[4]);
  else
    $list = explode(",", "34,56,36,67,46587,345,56,3,59,27,47,35");
} elseif ($modus == 2){
  if ($_REQUEST['sort'])
    $sort = $_REQUEST['sort'];
  else
    $sort = "bubble";

  if ($_REQUEST['st'])
    $search_type = $_REQUEST['st'];
  else
    $search_type = 'linear';

  if ($_REQUEST['list'])
    $list = explode(",", $_REQUEST['list']);
  else
    $list = explode(",", "34,56,36,67,46587,345,56,3,59,27,47,35");

  if ($_REQUEST['s'])
    $search = $_REQUEST['s'];
  else
    $search = "32";
} else{
  $sort = "bubble";
  $search_type = 'linear';
  $list = explode(",", "34,56,36,67,46587,345,56,3,59,27,47,35");
  $search = "32";
}

$unsorted_list = array('linear', 'bfs');

$start = microtime();
echo "Start Process: ".$start."<br>\n";

//Verlangt die Suchmethode nach einer vorsortierten Liste?
if (!in_array($search_type, $unsorted_list))
{
  echo "Sorting method: ".$sort."<br>\n";
  $startsort = microtime();
  echo "Start Sorting: ".$startsort."<br>\n";
  include_once("sort/".$sort.".php");
  $endsort = microtime();
  echo "End Sorting: ".$endsort."<br>\n";
  echo "Duration sort: ".($endsort-$startsort)."<br>\n";
}

echo "Search method: ".$search_type."<br>\n";
$startsearch = microtime();
echo "Start Searching: ".$startsearch."<br>\n";
include_once("search/".$search_type.".php");
$endsearch = microtime();
echo "End Searching: ".$endsearch."<br>\n";
echo "Duration Search: ".($endsearch-$startsearch)."<br>\n";

$end = microtime();
echo "End Process: ".$end."<br>\n";

echo "Duration Process: ".($end - $start)."<br>\n";

?>
