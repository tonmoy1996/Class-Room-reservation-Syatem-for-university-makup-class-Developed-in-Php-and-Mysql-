<?php
session_start();
if($_SESSION["admin"]=="block" &&  $_SESSION["superviser"]=="block")
{


header ('Location: ../../controllers/login.php');


}
require_once('../../controllers/db.php');

 if(isset($_REQUEST['submit'])) {

	   $mdate=$_POST['mdate'];

       $cdate=date("Y-m-d");

       $msg=$_POST['message'];


  if($con == null)
  {
    die('error connecting database');
  }

   $sql ="INSERT INTO locked_shedules VALUES (null,'$mdate','$msg','$cdate')";
		 $con->query($sql);


		echo 'successfull';

  }




?><!DOCTYPE html>
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

          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">


          <form method="post" action=""  >
            <h3 class="page-heading mb-4">ADD AIUB OFFICIAL MAKEUP :</h3>
            <table>
              <tr><td>Which date u want to set Makup:</td></tr>
              <tr>

                <td>
                  <input type="date" name="mdate" required>

                </td>
              </tr>
               <tr>

                <td>
                  <span>Notice about Makup calss</span>
                </td>
              </tr>
              <tr>

                <td>
                  <textarea name="message" rows="5" cols="100" required></textarea>
                </td>
              </tr>

              <tr>
                <td>
                  <input type="submit" name="submit" value="ADD NOTICE"  class="btn btn-primary"  >
                </td>

              </tr>



            </table>

          </form>






        </div>
        </div>
        </div>
        </div>






<div class="row mb-2">



          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

                  <h2 class="card-title mb-4" align="center">Delete Locked Date And Reasons:</h2>
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>
                        <tr class="text-primary">
                          <th>Lock Date</th>
                          <th>Reasons</th>

                          <th>Options</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr class="">
                          <?php

                          require_once '../../controllers/db.php';

                          $sql = "SELECT * FROM locked_shedules";
                          $result = $con->query($sql);
                          $output = '';
                          while($row =$result->fetch_assoc())
                          {
                            $output .= '<tr>';
                            $output .= "<td>$row[maked]</td>";
                            $output .= "<td>$row[note]</td>";


                            $output .= "<td><a href='delete.php?did=$row[id]'class='btn btn-danger btn-sm'>Delete</a></td>";
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











        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">AIUB</a> &copy; 2017
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
