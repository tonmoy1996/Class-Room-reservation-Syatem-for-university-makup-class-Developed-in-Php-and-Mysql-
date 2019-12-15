<?php

session_start();

    if(isset($_POST['pre'])){

		$low =	$_SESSION['low'];
			$hig = $_SESSION['high'];


$low1 = date ( 'Y-m-d', strtotime ( '-7 day' . $low ) );
$hig1 = date ( 'Y-m-d', strtotime ( '-7 day' . $hig ) );

$_SESSION['low']=$low1;
$_SESSION['high']=$hig1;


    }
    if(isset($_POST['nxt'])){

			$low =	$_SESSION['low'];
				$hig = $_SESSION['high'];


			$low1 = date ( 'Y-m-d', strtotime ( '+7 day' . $low ) );
			$hig1 = date ( 'Y-m-d', strtotime ( '+7 day' . $hig ) );

			$_SESSION['low']=$low1;
			$_SESSION['high']=$hig1;


}
    ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align='center'>
	<h2>Schedule of Booked Theory Classes </h2>

	<br/><br/>

	<table border="1">
		<tr>
			<th>Faculty Name</th>
			<th>Subject</th>
			<th>Section</th>

			<th>Date</th>

			<th>Time</th>

			<th>Room Number</th>

		</tr>
		<?php

		require_once '..\controllers\db.php';

		$dat=$_SESSION['labx'];

if ($dat==0)
{

	$d=date('Y-m-d');
	$d2=date('Y-m-d', strtotime('+7 days'));

$_SESSION['labx']=1;

$_SESSION['low']=$d;
$_SESSION['high']=$d2;


}

$lowlst =	$_SESSION['low'];
	$higlst = $_SESSION['high'];

echo " Showing date from :  <br>";

echo $lowlst;
echo "<br> To   <br>  ";
echo  $higlst;

		$sql = "SELECT * FROM tbk";
		$result = $con->query($sql);
		$output = '';
		while($row = $result->fetch_assoc())
		{

			if($row['datee'] >= $lowlst AND $row['datee'] <= $higlst)


						{
			$output .= '<tr>';
			$output .= "<td>$row[faculty]</td>";
			$output .= "<td>$row[sub]</td>";
			$output .= "<td>$row[sec]</td>";
			$output .= "<td>$row[datee]</td>";

			$output .= "<td>$row[timee]</td>";

			$output .= "<td>$row[Room]</td>";
			$output .= '</tr>';
		}

}
		mysqli_close($con);





		echo $output; ?>
	</table>

	<form method="post">

		<br>
		<br>
	<input type="submit" value="Previous" name="pre" >
	 <input type="submit" value="Next" name="nxt" >
	<br>
	<br>

	</form>

</div>
</body>
</html>
