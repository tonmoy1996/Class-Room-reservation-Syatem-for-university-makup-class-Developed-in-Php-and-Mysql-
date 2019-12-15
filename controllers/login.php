<?php

session_start();
$_SESSION["admin"]="block";
$_SESSION["user"]="block";
$_SESSION["superviser"]="block";



header('Cache-Control: no cache'); //no cache

require_once('db.php');
$err = ['id' => '', 'pass' => ''];

if(isset($_REQUEST['btnSubmit'])) {

       $name=$_POST['id'];
       $pass=$_POST['pass'];
        if($name == '')
		{
			$_SESSION['msg'] = 'Id Required!!';

 header("Location:error.php");

		}
	else if($pass == '')
		{
			$_SESSION['msg'] = 'password required!!';

    header("Location:error.php");

		}


else
{


   $sql = "SELECT * FROM faculty WHERE faculty_id= '$name' AND password='$pass' ";



	     $result = $con->query($sql);

         $count = 0;
          $count = $result->fetch_assoc();

if($count!=0){

//echo "successfull";



$_SESSION['moukh']= $name;

$_SESSION['a']='moukh';


if ($name=='ADMIN') {

  $_SESSION["admin"]="ok";
  header("Location: admin.php");
}
else if ($name=='SUPERVISER') {

  $_SESSION["superviser"]="ok";
  header("Location: admin.php");
}
else {
$_SESSION["user"]="ok";
  require_once '../view/1stview/pro.php';

}


}
else {
echo "Wrong Username or Password";
}

}
}


else {




require_once '../view/login/log.html';




}
?>
