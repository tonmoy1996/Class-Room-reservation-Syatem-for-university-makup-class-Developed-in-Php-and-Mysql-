<?php

session_start();
require_once('db.php');

 $a= $_GET['did'];


 $b=$_SESSION['cdate'];





 $sql11 = "SELECT semestername FROM semesters  WHERE status=1";

          $result11 = $con->query($sql11);



       if($row = $result11->fetch_assoc())
       {

        $csem= $row["semestername"];

       }



          $faculty=$_SESSION['moukh'];

          echo $a;
          echo $faculty;
          echo $csem;




      $sql11 = "SELECT * FROM classes  WHERE  course_id ='$a' ";

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
        $time = $interval->format('%h');
echo $time;


$sql11 = "SELECT * FROM canceled_classes  WHERE  	faculty = '$faculty' AND 	course_id='$a' AND semester ='$csem' AND	datee ='$b'  ";

     $result11 = $con->query($sql11);



  if($row = $result11->fetch_assoc())
  {


  }

else {
  # code...



  $sql = "INSERT INTO canceled_classes (faculty,datee,course_id,coursename,course_type,timee,semester) VALUES ('$faculty','$b','$a','$course','$type','$time','$csem')";


   $con->query($sql);







$_SESSION['again']=$b;


$_SESSION['vai']="allok";

//echo '<script language="javascript">';
//echo 'alert(" ")';





header('Location: chosee.php');
//echo 'window.location= "chosee.php"';

//echo '</script>';
}

//header('Location: chosee.php');
//require_once 'chosee.php';


 ?>
