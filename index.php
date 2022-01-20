<?php
session_start();
if(!empty($_SESSION['message'])) {
 $message = $_SESSION['message'];
 echo "<script type='text/javascript'>alert('$message');</script>";
    unset($_SESSION['message']);
    
  }

?>


<!DOCTYPE html>

<meta charset=utf-8>
<h2>Добавить Фильм</h2>
<form action="insert.php"  method="post">
  <label for="name">Название: </label>
    <input required type="text" id="name" name="name"><br>

  <label for="year">Год выпуска: </label>
    <input required type="text" id="year" name="year"><br>

  <label for="format">Формат:</label>
    <select name="format" id="format">
      <option value="VHS">VHS</option>
      <option value="DVD">DVD</option>
      <option value="Blu-Ray">Blu-Ray</option>
    </select><br>

  <label for="actor">Список актеров (“Имя и фамилия актера”): </label>
    <input required type="text" id="actor" name="actor"><br>
  
  <input type="submit" value="Submit" >


</form >



<h2>Удалить фильм</h2>
<?php

include "dbConn.php";


$result = $conn->query("SELECT * FROM films ORDER BY LOWER(name)");


$a = array();
$b = array();
$i=0;
 foreach($result as $row)
  { 
    $a[$i]=mb_strtolower($row["name"],'UTF-8');
    $b[$i]=$row["name"];
    $id[$i]=$row["id"];
    $i++;

  }
$c = $a;
array_multisort($a,$b);
array_multisort($c,$id);


echo "<form action='delete.php' method='post'>";

  echo "<label for='todelete'>Фильмы:</label>
  <select name='todelete' id='todelete'>";

  
  $i=0;

  foreach($b as $row1)
  {
    echo "<option value='". $id[$i]."'>".$b[$i]."</option>";
    $i++;

  }
    echo "</select><br>";

  echo "<input type='submit' value='Submit'>";
echo "</form>";
  




echo "<h2>Информация о фильме </h2>";

$result = $conn->query("SELECT * FROM films ORDER BY LOWER(name)");

$a = array();
$b = array();
$i=0;
 foreach($result as $row)
  { 
    $a[$i]=mb_strtolower($row["name"],'UTF-8');
    $b[$i]=$row["name"];
    $id[$i]=$row["id"];
    $i++;

  }
$c = $a;
array_multisort($a,$b);
array_multisort($c,$id);


echo "<form action='info.php' method='post'>";

    echo "<label for='inform'>Фильмы:</label>
  <select name='inform' id='inform'>";


  $i=0;

  foreach($b as $row1)
  {
    echo "<option value='". $id[$i]."'>".$b[$i]."</option>";
    $i++;

  }
  echo "</select><br>";

echo "<input type='submit' value='Submit'>";
echo "</form>";

?>





<h2>Показать фильмы в алфавитном порядке</h2>

<form action=sort.php  method="post">
  <input type="submit" value="Submit">
</form>


<h2>Найти фильм по названию</h2>

<form action=namesearch.php  method="post">

  <label for="namesearch">Название: </label>
    <input required type="text" id="namesearch" name="namesearch"><br>

  <input type="submit" value="Submit">
</form>


<h2>Найти фильм по имени актера</h2>

<form action=actorsearch.php  method="post">

  <label for="namesearch">Имя: </label>
    <input required type="text" id="actorsearch" name="actorsearch"><br>

  <input type="submit" value="Submit">
</form>

<h2>Добавить фильмы из файла</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">
  <input required type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Добавить" name="submit">
</form>


</html>