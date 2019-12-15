<?php


require_once('db.php');




if(isset($_POST['submit']))
{

 $file = $_FILES['file']['tmp_name'];

 $handle = fopen($file,"r");

 while(($fileop = fgetcsv($handle,1000,",")) !==false)

 {

  $faculty = $fileop[0];
  $datee = $fileop[1];
  $course = $fileop[2];
  $sec = $fileop[3];
  $time = $fileop[4];





  $sql = "INSERT INTO cancel_class (faculty,datee,course,sec,timee) VALUES ('$faculty','$datee','$course','$sec','$time')";


   $con->query($sql);


}


   echo 'successfully updated!!!';


}


?>
<!DOCTYPE html>
<html>
<head>

<title>Import a CSV File with PHP & MySQL</title>



</head>
<body>
<center>
<h2>Lode the csv file of the cancle classes </h2>
<br >
<br >
<br >

<div id="mainWrapper">

<form method="post" action="" enctype="multipart/form-data">
  <input type="file" name="file" />
  <br >
  <br >
  <br >
  <input type="submit" name="submit" value="Submit" />
</form>

</div>
</center>
</body>

</html>﻿
