<?php
$rr='sexy';
session_start();









if($_SESSION["admin"]=="block" &&  $_SESSION["superviser"]=="block")
{


header ('Location: ../../controllers/login.php');


}



             if(isset($_REQUEST['date'])) {



          $_SESSION['low']=$_REQUEST['date'];


          $_SESSION['high']=date('Y-m-d', strtotime('+7 days' . $_SESSION['low']));

  }


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
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin</title>
  <link rel="stylesheet" href="../../node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>


  <div class=" container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="../../view/admin/admin.html"><img src="../../images/logo_star_black.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="../../view/admin/admin.html"><img src="../../images/logo_star_mini.jpg" alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline mt-2 mt-md-0 d-none d-lg-block">
          <input class="form-control mr-sm-2 search" type="text" placeholder="Search">
        </form>
        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
          <li class="nav-item">
            <a class="nav-link profile-pic" href="#"><img class="rounded-circle" src="../../images/face.jpg" alt=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-th"></i></a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- partial -->
    <?php



    if($_SESSION["admin"]=="block"){
      require_once '../supop.php';
    }
      else {
    require_once '../adminop.php';
      }

     ?>

        <!-- partial -->
        <div class="content-wrapper">
          <h3 class="page-heading mb-4">Schedule of Booked Theory Classes</h3>

<table align="center">
                        <tr>





                        <form>
                      <td>
                    <h5>Select Desire Date:</h5>
                  </td>
                  <td>

                      <input onchange='this.form.submit();' type="Date" class="form-control p_input" id ="date" name="date"></td>


                        </form>
                         </tr>

                        </table>

                        <br><br>


          <div class="row mb-2">
						<div class="col-lg-12 mb-4">
              <div class="card">
                <div class="card-body">

                  <table class="table table-striped">

                    <thead>
                      <tr class="">
                        <th>Faculty Name</th>
                  			<th>Subject</th>


                  			<th>Date</th>


                  			<th>Time</th>

                  			<th>Room Number</th>
                         <th>Booking Delete</th>
                      </tr>
                    </thead>




                    <tbody>


                      <?php

                  		require_once '../../controllers/db.php';

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

                  $sql11 = "SELECT semestername FROM semesters  WHERE status=1";

                           $result11 = $con->query($sql11);



                        if($row = $result11->fetch_assoc())
                        {

                         $csem= $row["semestername"];

                        }





                  		$sql = "SELECT booking.id, booking.faculty,booking.sub,booking.datee,booking.timee,booking.Room FROM booking LEFT JOIN classes on booking.course_id= classes.course_id where classes.type='Theory'AND booking.semester='$csem'";
                  		$result = $con->query($sql);
                  		$output = '';
                  		while($row = $result->fetch_assoc())
                  		{

                  			if($row['datee'] >= $lowlst AND $row['datee'] <= $higlst)


                  						{
                  			$output .= '<tr>';
                  			$output .= "<td>$row[faculty]</td>";
                  			$output .= "<td>$row[sub]</td>";

                  			$output .= "<td>$row[datee]</td>";

                  			$output .= "<td>$row[timee]</td>";

                  			$output .= "<td>$row[Room]</td>";

                             $output .= "<td><a href='delete.php?did=$row[id]' class='btn btn-danger btn-sm'>Delete</a></td>";
                  			$output .= '</tr>';
                  		}

                  }
                  		mysqli_close($con);





                  		echo $output; ?>
                    </tbody>
                  </table>
                  <div align="center">

                  <form method="post" >

                		<br>
                		<br>
                	<input type="submit" value="Previous" name="pre"  class="btn btn-primary">
                	 <input type="submit" value="Next" name="nxt"  class="btn btn-primary">
                	<br>
                	<br>

                	</form>
                  </div>
                </div>
              </div>
            </div>



        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">Star Admin</a> &copy; 2017
            </span>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>

  </div>

  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
</body>

</html>
