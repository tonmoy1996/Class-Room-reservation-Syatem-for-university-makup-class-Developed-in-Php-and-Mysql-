<?php

session_start();
if($_SESSION["admin"]=="block")
{


header ('Location: ../../controllers/login.php');


}

require_once('../../controllers/db.php');


  if($con == null)
  {
    die('error connecting database');
  }

  $sql = "SELECT semestername FROM semesters  WHERE status=1";

       $result = $con->query($sql);



    while($row = $result->fetch_assoc())
    {

     $csem= $row["semestername"];

    }




if(isset($_POST['submit']))
{
  $sql2 = "DELETE FROM classes WHERE semester='$csem'";
 	echo $con->query($sql2);


 $file = $_FILES['file']['tmp_name'];

 $handle = fopen($file,"r");

 while(($fileop = fgetcsv($handle,1000,",")) !==false)

 {

  $ClassID = $fileop[0];
  //$Status = $fileop[1];
  //$Capacity = $fileop[2];
 // $Count = $fileop[3];
  $CourseTitle = $fileop[4];
  $Section = $fileop[5];
 // $Faculty = $fileop[6];
  $Type = $fileop[7];
  $Day = $fileop[8];
  $StartTime = $fileop[9];
  $EndTime = $fileop[10];
  $Room = $fileop[11];






  $sql = "INSERT INTO  classes (ClassID,CourseTitle,Section,Type,Day,StartTime,EndTime,Room,semester) VALUES ('$ClassID','$CourseTitle','$Section','$Type','$Day','$StartTime','$EndTime','$Room','$csem')";


   $con->query($sql);


}


   echo 'successfully updated!!!';
          header ('Location: csvfile.php');

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
          <h3 class="page-heading mb-4">CHOOSE FILE TO UPLOAD TO THE SERVER :</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <center>
                  <h5 class="card-title mb-4">UPLOAD IN .CSV FORMAT:</h5>
</br>
<form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
    <input type="file" name="file"  />    </br></br>

                    &nbsp;&nbsp;&nbsp;&nbsp;

                     <input type="submit" name="submit" value="submit" class="btn btn-primary"/>
                    </div>
                  </form>
                </div>
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
</center>
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
