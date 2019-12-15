<?php

if($_SESSION["admin"]=="block" &&  $_SESSION["superviser"]=="block")
{


header ('Location: ../../controllers/login.php');


}

	require_once '../../controllers/db.php';
	if($con == null)
	{
		die('error connecting database');
	}


 $sql = "DELETE FROM locked_shedules WHERE id=$_GET[did]";
	echo $con->query($sql);

header('Location: make.php');
?>
