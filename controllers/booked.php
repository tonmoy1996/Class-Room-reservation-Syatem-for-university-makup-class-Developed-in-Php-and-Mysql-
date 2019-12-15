<?php
session_start();
$xx=0;


$err = ['course' => '', 'sec' => '','type' => '','time' => '','date' => ''];

if($_SESSION['fcc'] == 'ok') {






           require 'db.php';
               $id=$_SESSION['iddd'];
              $sql = "SELECT * FROM canceled_classes where id='$id'";
                $result = $con->query($sql);


               while($row = $result->fetch_assoc())
               {

      $_SESSION['ci']= "$row[course_id]";
      $_SESSION['cname'] = "$row[coursename]";

      //$_SESSION['e'] = "$row[coursename]";
      $_SESSION['typ']= "$row[course_type]";
      $_SESSION['tim'] = "$row[timee]";
}
$xx=1;

}


if(isset($_REQUEST['date'])) {


if($xx!=1){

$title=$_POST['txtCountry'];


$first = strtok($title,']');
$sec=']';
$coursen = $first.$sec;

$ty = trim($title,$coursen);
if($ty=='heory'){
    $typee = 'Theory'  ;
         }
else{$typee = 'Lab';}





require 'db.php';
$c = $_SESSION['moukh'];


$sql11 = "SELECT semestername FROM semesters  WHERE status=1";

         $result11 = $con->query($sql11);



      if($row = $result11->fetch_assoc())
      {

       $csem= $row["semestername"];

      }

echo $coursen;


   $sql12 = "SELECT * FROM course_alocation WHERE faculty='$c' AND coursename='$coursen' AND  course_type	='$typee' AND  semester='$csem' AND status='1' ";
   $result12 = $con->query($sql12);



if($row12 = $result12->fetch_assoc())
{

echo "IN THE GAME";
$_SESSION['ci']= "$row12[courseid]";
$_SESSION['cname'] = "$row12[coursename]";
$_SESSION['typ']= "$row12[course_type]";



}
$xx=$_SESSION['ci'];
    echo $xx;


$sql11 = "SELECT * FROM classes  WHERE  course_id ='$xx' ";

    $result11 = $con->query($sql11);



 if($row = $result11->fetch_assoc())
 {

  $t1 = $row["StartTime"];
  $t2 = $row["EndTime"];

  $type = $row["Type"];

   $course = $row['CourseTitle'];

 }

 $datetime1 = new DateTime($t1);
 $datetime2 = new DateTime($t2);
 $interval = $datetime1->diff($datetime2);
 $tt = $interval->format('%h');



$_SESSION["tim"] = $tt;

}








$date=$_REQUEST['date'];

$_SESSION["date"] = $_REQUEST['date'];


         $_SESSION["Sub"] =$_SESSION["cname"];




  $a = $date;
   $_SESSION["day"] = date('l', strtotime($a));


   $time = $_SESSION["tim"];
   $typee = $_SESSION["typ"];

   echo $typee;
if($typee=='Theory')
{
  if ($time == '2')
  {


 header("Location: theory2.php");
  }
   else
  {

  header("Location: theory1.php");
}
  }
   else
  {

   header("Location: labp.php");


}

}

else {
	require_once('../view/userview/userview.php');
}

?>
