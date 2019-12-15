<?php
 require_once '../../controllers/db.php';



 $sql = "DELETE FROM course_alocation WHERE id='$_GET[did]'";


	 echo $con->query($sql);
//echo $_GET['did'];
header('Location: confirm.php');


?>
