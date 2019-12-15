<?php

 require_once '../../controllers/db.php';

 $sql = "DELETE FROM booking WHERE id=$_GET[did]";
	echo $con->query($sql);

header('Location: slab.php');
?>
