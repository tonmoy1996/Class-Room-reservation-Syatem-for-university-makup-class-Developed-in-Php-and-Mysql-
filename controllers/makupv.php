<?php

require_once('db.php');
require_once '../view/makelab/lab.php';
 if(isset($_REQUEST['submit'])) {

	   $mdate=$_POST['mdate'];

       $cdate=date("Y-m-d");

       $msg=$_POST['message'];
$con  = new mysqli("127.0.0.1", "root", "", "finalweb");
  if($con == null)
  {
    die('error connecting database');
  }

   $sql ="INSERT INTO aiubmake VALUES ('$mdate','$msg','$cdate')";
		 $con->query($sql);


		echo 'successfull';

  }




?>
