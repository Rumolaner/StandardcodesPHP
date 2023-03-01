<?php

$found = false;

echo "Searching for ".$search."<br>\n";

for ($i = 0; $i < count($list);$i++)
{
  echo "Check ".$list[$i]."<br>\n";
  if ($list[$i] == $search)
  {
    $found = true;
    echo "Found at ".$i."<br>\n";
    break;
  }
}

if (!$found)
  echo $search." not found<br>\n";

?>
