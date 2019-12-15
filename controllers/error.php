<?php

session_start();

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Error</h3>
	<p>Oops! something unexpected happened</p>

	<p>
    <?php

  echo  $_SESSION['msg'];

    ?>
  </p>

	<p>Click <a href="login.php">here</a> to start over</p>
</body>
</html>
