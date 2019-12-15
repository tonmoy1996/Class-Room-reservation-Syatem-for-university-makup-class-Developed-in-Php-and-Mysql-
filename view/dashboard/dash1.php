
<?php


session_start();
if($_SESSION["admin"]=="block" &&  $_SESSION["superviser"]=="block")
{


header ('Location: ../../controllers/login.php');


}
      //  view\supop.php
    //    view\adminop.php

require_once '../../controllers/db.php';
$cz=0;
$czz=0;
$cv=0;

$sql = "SELECT * FROM  semesters where status=1";


  $result = $con->query($sql);



if($row2 = mysqli_fetch_array($result))
{
              $o = $row2['semestername'];
}

$sql2 = "SELECT * from canceled_classes where semester='$o'";

      $result2 = $con->query($sql2);


      while($row2 = $result2->fetch_assoc())
      {
                    $cz=$cz+1;
       }



       $sql3 = "SELECT * from booking where semester='$o'";




       $result3 = $con->query($sql3);


       while($row3 = $result3->fetch_assoc())
       {
                     $cv=$cv+1;
         }

         $sql2 = "SELECT * from canceled_classes where semester='$o' AND status=0";

               $result2 = $con->query($sql2);


               while($row2 = $result2->fetch_assoc())
               {
                             $czz=$czz+1;
                }

$x=($czz/$cz)*100;



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
  <h3 class="page-heading mb-4" align="center">DashBoard</h3>
  <h4 class="page-heading mb-4" align="center">Statistics Of This Semester</h4>
  <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="clearfix">
            <i class="fa fa-times-rectangle float-right icon-grey-big"></i>
          </div>
          <h4 class="card-title font-weight-normal text-success"><?php echo $cz; ?></h4>
          <h6 class="card-subtitle mb-4">Total Cancel Classes</h6>
          <div class="progress progress-slim">
            <div class="progress-bar bg-success-gadient" role="progressbar" style="width: <?php echo $cz; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="clearfix">
            <i class="fa fa-book float-right icon-grey-big"></i>
          </div>
          <h4 class="card-title font-weight-normal text-info"><?php echo $cv; ?></h4>
          <h6 class="card-subtitle mb-4">Total Booked Classes</h6>
          <div class="progress progress-slim">
            <div class="progress-bar bg-info-gadient" role="progressbar" style="width: <?php echo $cv; ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="clearfix">
            <i class="fa fa-bullhorn float-right icon-grey-big"></i>
          </div>
          <h4 class="card-title font-weight-normal text-warning"><?php echo $czz; ?></h4>
          <h6 class="card-subtitle mb-4">Pending Cancel Classes</h6>
          <div class="progress progress-slim">
            <div class="progress-bar bg-warning-gadient" role="progressbar" style="width: <?php echo $czz; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="clearfix">
            <i class="fa fa-pie-chart float-right icon-grey-big"></i>
          </div>
          <h4 class="card-title font-weight-normal text-danger"><?php echo round($x,2); ?>%</h4>
          <h6 class="card-subtitle mb-4">Pending Class Ratio</h6>
          <div class="progress progress-slim">
            <div class="progress-bar bg-danger-gadient" role="progressbar" style="width: <?php echo $x; ?>%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h4 class="page-heading mb-4" align="center">Class Statistics This Semester</h4>
          <div class="row mb-2">
						<div class="col-lg-12s mb-4">
              <div class="card">
                <div class="card-body">

                  <table class="table table-striped">

                    <thead>
                      <tr class="">
                        <th>CourseId</th>
                  			<th>CourseTitle</th>
                        <th>Room Number</th>
                        <th>Class Type</th>
                        <th>Day</th>
                        <th>Total Cancelled</th>

                        <th>Total Booked</th>
                        <th>Total Class Taken</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                  		require_once '../../controllers/db.php';

$sql = "SELECT * FROM  semesters where status=1";


  $result = $con->query($sql);



if($row2 = mysqli_fetch_array($result))
{
              $cs = $row2['semestername'];
}


                  $sql = "SELECT * from classes where semester='$cs'";





                  		$result = $con->query($sql);

                      $output ='';
                  		while($row = $result->fetch_assoc())
                  		{
                          $cc=0;
                         $bk=0;
                         $dd=0;

                  			$output .= '<tr>';
                        $o = $row['course_id'];
                  			$output .= "<td>$o</td>";
                  			$output .= "<td>$row[CourseTitle]</td>";


                     	$output .= "<td>$row[Room]</td>";

                          $output .= "<td>$row[Type]</td>";
                          $output .= "<td>$row[Day]</td>";
                $sql2 = "SELECT * from canceled_classes where course_id='$o'";

                      $result2 = $con->query($sql2);


                      while($row2 = $result2->fetch_assoc())
                      {
                                    $cc=$cc+1;
                       }

                      $sql3 = "SELECT * from booking where course_id='$o'";




                      $result3 = $con->query($sql3);


                      while($row3 = $result3->fetch_assoc())
                      {
                                    $bk=$bk+1;
                        }

             $sql4 = "SELECT * from canceled_classes where course_id='$o' AND status=1";

                      $result4 = $con->query($sql4);


                      while($row4 = $result4->fetch_assoc())
                      {
                                    $dd=$dd+1;
                       }







                          $output .= "<td><a href='c_count.php?did=$o' class='btn btn-outline-danger'>$cc</a></td>";
                      $output .= "<td><a href='b_count.php?did=$o' class='btn btn-outline-success mr-2'>$bk</a></td>";


                       $output .= "<td><a href='taken.php?did=$o' class='btn btn-outline-info mr-2'>$dd</a></td>";





                  			$output .= '</tr>';


                  }



                  		echo $output;


                      ?>
                    </tbody>
                  </table>


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
