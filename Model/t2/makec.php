

<?php

function chekthesed($X)

{$con =new mysqli('localhost', 'shieldsoft_aiub', 'Aiub007##@@' , 'shieldsoft_portal');
	//$con =new mysqli('localhost','root','', 'extra_class_room_alocation');
	if($con == null)
	{
		die('error connecting database');
	}


$sql = "SELECT * FROM locked_shedules WHERE maked='$X'";



	$result = $con->query($sql);

$count = 0;
$count = $result->fetch_assoc();


if($count!=0){

header("Location: err.php");


}
else {

}

}

?>
