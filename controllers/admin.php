<?php

session_start();



if($_SESSION["admin"]=="block")
{


header ('Location: login.php');


}

$_SESSION['labx']=0;
header ('Location: ../view/admin/admin.php');





?>
