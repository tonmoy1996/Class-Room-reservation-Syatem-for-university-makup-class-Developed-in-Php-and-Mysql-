<?php

require_once('db.php');
	if($con == null)
	{
		die('error connecting database');
	}


 $sql = "DELETE FROM notice WHERE id=$_GET[did]";
	echo $con->query($sql);

header('Location: ../view/notice/nt.php');
?>
