<?php


require_once('db.php');


$con  = new mysqli("127.0.0.1", "root", "", "finalweb");
  if($con == null)
  {
    die('error connecting database');
  }

  $sql = "SELECT semestername FROM curent_semester  WHERE id=1";

       $result = $con->query($sql);



    while($row = $result->fetch_assoc())
    {

     $csem= $row["semestername"];

    }




if(isset($_POST['submit']))
{



 $file = $_FILES['file']['tmp_name'];

 $handle = fopen($file,"r");

 while(($fileop = fgetcsv($handle,1000,",")) !==false)

 {

  $ClassID = $fileop[0];
  $Status = $fileop[1];
  $Capacity = $fileop[2];
  $Count = $fileop[3];
  $CourseTitle = $fileop[4];
  $Section = $fileop[5];
  $Faculty = $fileop[6];
  $Type = $fileop[7];
  $Day = $fileop[8];
  $StartTime = $fileop[9];
  $EndTime = $fileop[10];
  $Room = $fileop[11];





  $sql = "INSERT INTO timet (ClassID,Status,Capacity,Count,CourseTitle,Section,Faculty,Type,Day,StartTime,EndTime,Room,semester) VALUES ('$ClassID','$Status','$Capacity','$Count','$CourseTitle','$Section','$Faculty','$Type','$Day','$StartTime','$EndTime','$Room','$csem')";


   $con->query($sql);


}


   echo 'successfully updated!!!';
loadC();

}
function loadC()
{
   $con  = new mysqli("127.0.0.1", "root", "", "finalweb");


   $sql11 = "SELECT semestername FROM curent_semester  WHERE id=1";

        $result11 = $con->query($sql11);



     while($row = $result11->fetch_assoc())
     {

      $csem= $row["semestername"];

     }



	if($con == null)
	{
		die('error connecting database');
	}


		$sql = "DELETE FROM lab";
		 $con->query($sql);




			$sql = "DELETE FROM theory";
	     $con->query($sql);
          echo 'successful';

           $sql = "SELECT * FROM timet WHERE Type='Lab' AND semester='$csem' ";
	  $result = $con->query($sql);
	$row = $result->fetch_assoc();
    if(!$row)
	{
		echo 'timet does not exist';
		return;
	}

while($row = $result->fetch_assoc())
	{
     $sql = "INSERT INTO lab VALUES ('$row[ClassID]', '$row[Status]', '$row[Capacity]','$row[Count]','$row[CourseTitle]','
	$row[Section]','$row[Faculty]','$row[Type]','$row[Day]','$row[StartTime]','$row[EndTime]','$row[Room]')";
		$con->query($sql);


}



$sql = "SELECT * FROM timet WHERE Type='Theory' AND semester='$csem' ";
	  $result = $con->query($sql);
	$row = $result->fetch_assoc();
    if(!$row)
	{
		echo 'timet does not exist';
		return;
	}

while($row = $result->fetch_assoc())
	{
     $sql = "INSERT INTO theory VALUES ('$row[ClassID]', '$row[Status]', '$row[Capacity]','$row[Count]','$row[CourseTitle]','
	$row[Section]','$row[Faculty]','$row[Type]','$row[Day]','$row[StartTime]','$row[EndTime]','$row[Room]')";
		$con->query($sql);


}

echo "You have successfully loaded all the records!!";



}

?>
<!DOCTYPE html>
<html>
<head>

<title>Import a CSV File with PHP & MySQL</title>



</head>
<body>

<div id="mainWrapper">

<form method="post" action="" enctype="multipart/form-data">
  <input type="file" name="file" />
  <br />
  <input type="submit" name="submit" value="Submit" />
</form>

</div>

</body>

</html>﻿
