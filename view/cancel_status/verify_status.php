<?php
 require_once '../../controllers/db.php';
 if($_SESSION["admin"]=="block" &&  $_SESSION["superviser"]=="block")
 {


 header ('Location: ../../controllers/login.php');

 
 }

 $sql1 = "UPDATE canceled_classes SET status=1 WHERE id=$_GET[did]";

if ($con->query($sql1) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

header('Location: status.php');


?>
