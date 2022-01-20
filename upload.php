<?php

include "dbConn.php";

$content = file_get_contents($_FILES['fileToUpload']['tmp_name']);


$open = fopen($_FILES['fileToUpload']['tmp_name'],'r');

$i = 0;
$check = 0;
$check2 = 0;

while (($line = fgets($open)) !== false) {

	$i=$i+1;
    $title = explode("Title: ",$line);
    
	if (!empty($title[1])){
	  
		$line = fgets($open);
		$year = explode("Release Year: ",$line);
		$year[1] = trim($year[1]);
		$line = fgets($open);
		$format = explode("Format: ",$line);
		$format[1] = trim($format[1]);
		$line = fgets($open);
		$stars = explode("Stars: ",$line);

		if ((strlen($year[1]) == 4 && is_numeric($year[1]))&&($format[1]=='VHS'||$format[1]=='DVD'||$format[1]=='Blu-Ray')) {

			
			$check = 1;

			$check1 = $conn->query( "SELECT * FROM films WHERE name = '$title[1]' AND year = $year[1] AND format = '$format[1]' AND actor = '$stars[1]' ");
 			$j=0;
  			foreach($check1 as $row)
  			{
  			  $j = $j+1;

  			}

  			if ($j < 1){
  				$check2++;
				$sql = $conn->query("INSERT INTO films (name, year, format, actor)
				VALUES ('$title[1]', $year[1], '$format[1]', '$stars[1]')");

			}
			else{
			  echo "Такой Фильм уже есть!";
			}
			echo $title[1]." ".$year[1]." ".$format[1]." ".$stars[1]."<br>";
		}

		
	}

	
}
if($check2>0){
	if ($i>0&&$check==1){
	
      session_start();
      $_SESSION['message'] = 'Фильмы добавлены!';
      header('Location: index.php');
      exit();
	
	}
	else if ($i<1){
	
		echo "файл пуст!";
	}

	else{
		echo "фильм не добавлен, неправильный год или формат"."<br>";
	}
}

if ($i<1){
	
		echo "файл пуст!";
}
?>



