<?php
if($_SESSION["admin"]=="block" &&  $_SESSION["superviser"]=="block")
{


header ('Location: ../../controllers/login.php');


}
 require_once '../../controllers/db.php';

 $sql = "DELETE FROM booking WHERE id=$_GET[did]";
	echo $con->query($sql);

header('Location: slab.php');
?>
