
<?php
include "dbConn.php";

$name = $_POST["namesearch"];

$result= $conn->query("SELECT * FROM films WHERE name LIKE '%$name%' ORDER BY LOWER(name) ");

$i=0;
foreach($result as $row)
{

  echo $row["name"]."<br>";
  $i++;

}

if($i<1){
  echo "ничего не отображать";
}
?>


