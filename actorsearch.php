
<?php
include "dbConn.php";

$name = $_POST["actorsearch"];

$result= $conn->query("SELECT * FROM films WHERE actor LIKE '%$name%' ORDER BY LOWER(name) ");

$i=0;

  foreach($result as $row)
  {

    echo "Фильм: ".$row["name"]." || Актеры: ".$row["actor"]."<br>";
    $i++;
  }

if($i<1){
  echo "ничего не отображать";
}

?>