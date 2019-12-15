<?php

	// CONNECT

$con =new mysqli('localhost', 'shieldsoft_aiub', 'Aiub007##@@' , 'shieldsoft_portal');

//$con =new mysqli('localhost','root','', 'extra_class_room_alocation');


	if($con == null)
	{
		die('error connecting database');
	}

?>
