
<?php

include "dbConn.php";

$info = $_POST["inform"];




$result = $conn->query( "SELECT * FROM films WHERE id = '$info'");

foreach($result as $row)
{

	echo "<p>Название: " .$row["name"]."</p>";
	echo "<p>Год выпуска: " .$row["year"]."</p>";
	echo "<p>Формат: " .$row["format"]."</p>";
	echo "<p>Список Актеров: " .$row["actor"]."</p>";
}

?>