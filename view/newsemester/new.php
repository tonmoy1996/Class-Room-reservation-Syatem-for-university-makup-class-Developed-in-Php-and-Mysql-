<?php


if(isset($_REQUEST['btn'])) {


  require_once('db.php');

	$sem=$_POST['sem'];

            $time  = date("Y-m-d");

			 $date  = strtotime($time);

		  $year  = date('Y',$date);




         $conn=$sem."-".$year;



$sql = "UPDATE curent_semester SET semestername= '$conn' WHERE id=1";


	if ($con->query($sql) === TRUE) {
    
} else {
    echo "Error updating record: ";
}

  }

  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>

	<h2>Add New Semester And Year</h2>



	<form method="post" action="">
<table>
        <tr>
        <td>

       <span>Current Running Semester:</span>

        </td>
        <td>
        	<?php

  require_once('db.php');
   $sql = "SELECT semestername FROM curent_semester  WHERE id=1";



	     $result = $con->query($sql);



    while($row = $result->fetch_assoc())
    {

    	echo $row["semestername"];
    }



	?>




        </td>


        </tr>




	<tr>

		<td>
		 <span>Add Semester:</span>
		</td>

		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Year:

		</td>
	   </tr>


      <tr>
		<td>
			   <select  name = "sem" id ="sem" >
		  <option value="Fall">Fall</option>
		  <option value="Summer">Summer</option>
		  <option value="Spring">Spring</option>

		  </select>
		</td>



			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<?php

				    $time  = date("Y-m-d");

				    $date  = strtotime($time);

					$year  = date('Y',$date);

					echo $year;




				?>



			</td>


</tr>
<tr>
	<td></td>

	<td>
		<br>
		<br>

		<input type="submit" name="btn" value="Add New Semester">

	</td>

</tr>


</table>
    </form>


</table>

	</form>

</center>



</body>
</html>
