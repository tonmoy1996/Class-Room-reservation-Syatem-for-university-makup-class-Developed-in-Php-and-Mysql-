<?php

session_write_close();
session_start();
$_SESSION['fcc'] = 'ok';

 $a= $_GET[did];

$_SESSION['iddd']=$a;
//echo $a;
header('Location: booked.php');







 ?>
