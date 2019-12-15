


<?php


session_start();
	if(isset($_POST['btnSubmit']))
	{
require_once('db.php');

             $cid=$_SESSION['ci'];
          $b_Fac= $_SESSION['moukh'];
         $b_sub= $_SESSION["Sub"];
         echo $b_sub;

 	       $b_time= $_SESSION['T_t'];
 	      $b_room= $_REQUEST['labf'];


				if ($_SESSION['fcc'] = 'ok') {
			$ciid=$_SESSION['iddd'];
		}else {
			$ciid=0;
		}

         $b_date= $_SESSION['date'];




//current semester


$sql11 = "SELECT semestername FROM semesters  WHERE status=1";

         $result11 = $con->query($sql11);



      if($row = $result11->fetch_assoc())
      {

       $csem= $row["semestername"];

      }




		//INSERT
		$sql = "INSERT INTO booking (id,course_id,faculty, datee, timee, sub, Room,semester,cancel_id,class_type)
        VALUES (null,'$cid','$b_Fac', '$b_date', '$b_time', '$b_sub', '$b_room','$csem','$ciid','MAkeupclass')";
		if ($con->query($sql) === TRUE) {
    //echo "New record created successfully";

echo "<a href='profile.php'>Go Home</a>";




if($_SESSION['fcc'] == 'ok') {





}

header("Location: profile.php");

}


else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();


	}
?>
