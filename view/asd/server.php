<?php
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	require_once '../../controllers/db.php';

	$sql = $con->prepare("SELECT * FROM classes WHERE CourseTitle LIKE ?");
	$sql->bind_param("s",$search_param);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["CourseTitle"];
		}
		echo json_encode($countryResult);
	}
	$con->close();
?>
