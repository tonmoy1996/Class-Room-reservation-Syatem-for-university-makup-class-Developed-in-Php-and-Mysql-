<?php

session_start();




if(isset($_REQUEST['submit'])) {


  require_once('../../controllers/db.php');

              $classid=$_POST['c_id'];

              $title  =$_POST['title'];
               $section  =$_POST['sec'];
               $type  =$_POST['type'];
               $day  =$_POST['day'];
                $stime  =$_POST['stime'];
                 $etime  =$_POST['etime'];
                 $room  =$_POST['room'];




 $sql = "SELECT semestername FROM semesters  WHERE status=1";

       $result = $con->query($sql);



    while($row = $result->fetch_assoc())
    {

     $csem= $row["semestername"];

    }






  
  $sql = "INSERT INTO  classes (ClassID,CourseTitle,Section,Type,Day,StartTime,EndTime,Room,semester) VALUES ('$classid','$title','$section','$type','$day','$stime','$etime','$room','$csem')";


   $con->query($sql);

  header ('Location: add.php');






}























  ?>



