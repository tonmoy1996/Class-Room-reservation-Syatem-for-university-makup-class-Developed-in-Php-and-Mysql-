
<?php
session_start();
if($_SESSION["admin"]=="block" &&  $_SESSION["superviser"]=="block")
{


header ('Location: ../../controllers/login.php');


}
      //  view\supop.php
    //    view\adminop.php
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




        <h1>WELCOME ADMIN TO AIUB CLASS ROOM BOOKING SYSTEM</h1>



          <div align='center'>
            <h3 class="page-heading mb-4">Total Class Taken Of THis Course <h3>
          </div>





          <div class="row mb-2">



          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>
                        <tr class="text-primary">
                          <th>Faculty</th>
                          <th>Date</th>
                          <th>ClassTitle</th>
                          <th>Semester</th>
                         <th>Type</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="">
                          <?php

                          require_once '../../controllers/db.php';
                          $sql = "SELECT * FROM  canceled_classes where course_id=$_GET[did] AND status =1 ";
                          $result = $con->query($sql);
                          $output = '';
                          while($row =$result->fetch_assoc())
                          {
                            $output .= '<tr>';
                            $output .= "<td>$row[faculty]</td>";
                            $output .= "<td>$row[datee]</td>";
                            $output .= "<td>$row[coursename]</td>";
                       $output .= "<td>$row[semester]</td>";
                        $output .= "<td>$row[course_type]</td>";
                            $output .= '</tr>';
                          }


                          mysqli_close($con);




                          echo $output;

                          ?>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>







        </div>



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
