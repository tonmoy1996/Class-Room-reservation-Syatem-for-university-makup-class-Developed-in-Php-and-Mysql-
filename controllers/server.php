<?php		
  
   session_start();


	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	require_once('db.php');

	$faculty=$_SESSION['moukh'];

	$sql = $conn->prepare("SELECT * FROM course_alocation WHERE faculty='$faculty' AND coursename LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["coursename"];
		}
		echo json_encode($countryResult);
	}
	$conn->close();
?>

