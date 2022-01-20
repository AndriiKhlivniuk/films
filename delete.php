
<?php

include "dbConn.php";

$todelete = $_POST["todelete"];


echo $todelete;

$sql = $conn->query("DELETE FROM films WHERE id =$todelete");

if (!$sql) {
  print "<p> Could not delete </p>";
}

else{
  
  $_SESSION['message'] = 'Успешно удален';
  header('Location: index.php');
}

?>