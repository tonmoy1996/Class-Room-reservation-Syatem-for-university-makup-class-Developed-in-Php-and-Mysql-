<?php

	require_once('db.php');


  $sql = "SELECT * FROM timet WHERE Type='Lab' ";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
    if(!$row)
	{
		echo 'timet does not exist';
		return;
	}

while($row = mysql_fetch_assoc($result))
	{
     $sql = "INSERT INTO lab VALUES ('$row[ClassID]', '$row[Status]', '$row[Capacity]','$row[Count]','$row[CourseTitle]','
	$row[Section]','$row[Faculty]','$row[Type]','$row[Day]','$row[StartTime]','$row[EndTime]','$row[Room]')";
		mysql_query($sql);

	
}

echo "successfull!!!";
?>