<?php
include "dbConn.php";

$name = $_POST["name"];
$year = $_POST["year"];
$format = $_POST["format"];
$actor = $_POST["actor"];

if (strlen($year) == 4 && is_numeric($year)){

  $check = $conn->query( "SELECT * FROM films WHERE name = '$name' AND year = $year AND format = '$format' AND actor = '$actor' ");
  $i=0;
  foreach($check as $row)
  {
    $i = $i+1;

  }

  if ($i < 1){

    $sql = $conn->query ("INSERT OR IGNORE INTO films (name, year, format, actor)
    VALUES ('$name', $year, '$format', '$actor')");

    if (!$sql) {
      print "<p> Ошибка при добавлении </p>";
    }

    else{

      session_start();
      $_SESSION['message'] = 'Фильм добавлен!';
      header('Location: index.php');
      exit();
    }

  }

  else{
   echo "Такой Фильм уже есть!";
  }


}

else {
  print "<p> Год должен быть числом и содержать 4 символа </p>";
}
?>