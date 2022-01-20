<?php
include "dbConn.php";
setlocale(LC_ALL, "Russian_Russia.1251");
 
$result = $conn->query("SELECT name FROM films ORDER BY LOWER(name)");

$a = array();
$b = array();
$i=0;
 foreach($result as $row)
  { 
    $a[$i]=mb_strtolower($row["name"],'UTF-8');
    $b[$i]=$row["name"];
    //echo $row["name"]."<br>";
    $i++;

  }
array_multisort($a,$b);

 foreach($b as $row1){

    echo $row1."<br>";

  }

?>