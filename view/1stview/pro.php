<?php
require_once '../controllers/db.php';
$cz=0;
$czz=0;
$cv=0;
$dd= $_SESSION['moukh'];
$sql99 = "SELECT * FROM  semesters where status=1";


  $result99 = $con->query($sql99);



if($row299 = mysqli_fetch_array($result99))
{
              $o = $row299['semestername'];
}

$sql299 = "SELECT * from canceled_classes where faculty = '$dd' AND semester='$o'";

      $result299 = $con->query($sql299);


      while($row299 = $result299->fetch_assoc())
      {
                    $cz=$cz+1;
       }



       $sql399 = "SELECT * from booking where faculty = '$dd' AND semester='$o'";




       $result399 = $con->query($sql399);


       while($row399 = $result399->fetch_assoc())
       {
                     $cv=$cv+1;
         }

         $sql2999 = "SELECT * from canceled_classes where faculty = '$dd' AND  semester='$o' AND status=0";

               $result2999 = $con->query($sql2999);


               while($row2999 = $result2999->fetch_assoc())
               {
                             $czz=$czz+1;
                }

                  if($cz==0){$x=0;}
                  else {
                  $x=($czz/$cz)*100;
                  }



 ?>
<?php



      // session_start();

    require_once '../controllers/db.php';
  $c = $_SESSION['moukh'];


  $sql11 = "SELECT semestername FROM semesters";

           $result11 = $con->query($sql11);

      $options = "";

        while($row = $result11->fetch_assoc()){


$rr=$row['semestername'];
         $options = $options."<option value='$rr'>$rr</option>";

        }





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AIUB</title>
  <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="shortcut icon" href="../images/favicon.png" />

<style media="screen">
  select#soflow, select#soflow-color {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   margin: 20px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 300px;
}

select#soflow-color {
   color: #fff;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#1a75ff,  #0066ff 40%, #0052cc);
   background-color: #1a75ff;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   padding-left: 15px;
}
  </style>


</head>

<body>
  <div class=" container-scroller">
    <!-- partial:../partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="../controllers/profile.php"><img src="../images/logo_star_black.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="../controllers/profile.php"><img src="../images/logo_star_mini.jpg" alt=""></a>
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
            <a class="nav-link profile-pic" href="#"><img class="rounded-circle" src="../images/face.jpg" alt=""></a>
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
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:../partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="../images/face.jpg" alt="">




            <p class="name"><?php
            $cc=$_SESSION['moukh']; echo $cc; ?></p>





            <p class="designation">Faculty</p>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="login.php">
                <img src="../images/icons/1.png" alt="">
                <span class="menu-title">Logout</span>
              </a>
            </li>

          </ul>
        </nav>

        <!-- partial -->






        <div class="content-wrapper">


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

























              <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table center-aligned-table">


                                 <table>

                      <h3 align='center'>Cancel A Class: <h3>
                        <br>
                        <br>



                      <div  align='center'>
                      <form class="" action="../controllers/chosee.php" method="post">

                      <input type="date" name="dateee" required="required">


                      <input type="submit" name="add22" class="btn btn-danger btn-sm" value="CANCEL CLASS">





                      </form>

                      </div>



                                 </table>


                  <table class="table">

<tr>
<td>
<table>
  <tr>
  <td>
    <form method="post" action="../view/asd/index.php">


    <br>

  <input type="submit" value="Add You Courses " class="btn btn-primary btn-sm" name="btnC" >

  <br>
  <br>

</td>

</form>

<td>

  <br>


<form method="post" action="../controllers/booked.php">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="BOOK ROOM FOR EXTRA CLASS " class="btn btn-primary btn-sm" name="btn" >

<br>
<br>
</td>

</tr>

</form>
</table>
</td>


  <td >
<form action="../controllers/profile.php" method="post" name="ss">


        <select id="soflow-color" onchange='this.form.submit();' name = "sem" id ="sem">
          </form>


  <option value=""disabled hidden selected>Runing Semester</option>
            <?php echo $options;?>
        </select>
  </td>


</tr>


     </table>
        </div>





                     <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table center-aligned-table">


          <h2 align="center">YOUR PENDING CLASSES:</h2>

                      <thead>
                        <tr class="text-primary">


                            <th>Cancel Date</th>
                            <th>Course ID</th>
                            <th>Course Name </th>
                            <th>Class Status </th>
                            <th>Options</th>


                        </tr>
                      </thead>
                      <tbody>


                          <?php

if(isset($_REQUEST['sem'])) {

      $x=0;
  $_SESSION['fcc']= "not ok";

      require_once '../controllers/db.php';
  $c = $_SESSION['moukh'];

$csem=$_POST['sem'];


      $sql = "SELECT * FROM canceled_classes where faculty='$c' AND semester ='$csem' ";
      $result = $con->query($sql);
      $output = '';

      while($row =$result->fetch_assoc())
      {
        $output .= '<tr>';
        $output .= "<td>$row[datee]</td>";
        $output .= "<td>$row[course_id]</td>";
  $output .= "<td>$row[coursename]</td>";
$zz=$row['status'];
$zoz=$row['id'];

if($zz==0){


$output .= "<td><label class='badge badge-warning'>Pending</label></td>";




  $sql11 = " SELECT * FROM booking where cancel_id='$zoz'";

  $result11 = $con->query($sql11);



  if($row3 = $result11->fetch_assoc())
  {

$output .= "<td><label class='badge badge-success'>ALREADY ROOM BOOKED</label></td>";

}



else {




$output .= "<td><a href='b.php?did=$row[id]' class='btn btn-primary btn-sm'>Book Room</a></td>";  # code...
}

}else {
$output .= "<td><label class='badge badge-success'>Mackup Taken</label></td>";

$output .= "<td><label class='badge badge-danger'>NO NEED TO BOOK ROOM</label></td>";
}

  $output .= '</tr>';
  $x=1;



      }







}
else {
    $x=0;
$_SESSION['fcc']= "not ok";

    require_once '../controllers/db.php';
$c = $_SESSION['moukh'];

$sql11 = "SELECT semestername FROM semesters  WHERE status=1";

         $result11 = $con->query($sql11);



      if($row = $result11->fetch_assoc())
      {

       $csem= $row["semestername"];

      }


    $sql = "SELECT * FROM canceled_classes where faculty='$c' AND semester ='$csem' ";
    $result = $con->query($sql);
    $output = '';

    while($row =$result->fetch_assoc())
    {
      $output .= '<tr>';
      $output .= "<td>$row[datee]</td>";
      $output .= "<td>$row[course_id]</td>";
         $output .= "<td>$row[coursename]</td>";
            $zz=$row['status'];
            $zoz=$row['id'];

            if($zz==0){


$output .= "<td><label class='badge badge-warning'>Pending</label></td>";



  $sql11 = " SELECT * FROM booking where cancel_id='$zoz'";

  $result11 = $con->query($sql11);



  if($row3 = $result11->fetch_assoc())
  {

$output .= "<td><label class='badge badge-success'>ALREADY ROOM BOOKED</label></td>";

}



else {

$output .= "<td><a href='b.php?did=$row[id]' class='btn btn-primary btn-sm'>Book Room</a></td>";  # code...
}
}else {
  $output .= "<td><label class='badge badge-success'>Mackup Taken</label></td>";

    $output .= "<td><label class='badge badge-danger'>NO NEED TO BOOK ROOM</label></td>";
}

      $output .= '</tr>';
$x=1;



    }


  //  mysqli_close($con);



}


















if($x==0){

echo '<tr> <td> SIR YOU </td> <td> HAVE NO </td><td> PENDING </td> <td>makeup CLASS</td> </tr>';


}
  else
  {  echo $output;

  }





    ?>
                      </tbody>
                    </table>

                   </div>
                </div>
              </div>
            </div>
          </div>








<div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>
                        <tr class="text-primary">
                          <th>Schedule Date</th>
                            <th>Time</th>

                            <th>Subject</th>
                            <th>Cancel Date</th>

                            <th>Booking Type</th>
                            <th>Romm No</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="">
                          <?php



  $xx=0;

$_SESSION['vai']="notok";
$c1 = $_SESSION['moukh'];
echo "<h2 align='center'>You Booked Classes : <h2>";
require_once '../controllers/db.php';





  $sql1 = " SELECT * FROM booking where faculty = '$c1' AND semester='$csem'";

  $result = $con->query($sql1);

  $output1 = '';
$d=date("Y-m-d");

  while($row = $result->fetch_assoc())
  {
    if($row['datee'] >= $d)


      {
    $output1 .= '<tr>';
    $output1 .= "<td>$row[datee]</td>";
    $output1 .= "<td>$row[timee]</td>";
    $output1 .= "<td>$row[sub]</td>";


$cidd=$row['cancel_id'];


if($cidd==0){

$dd = 'Not A Mackup';

}


else {


$sql2 = "SELECT * FROM canceled_classes where id='$cidd'";
$result2 = $con->query($sql2);

while($row2 =$result2->fetch_assoc())
{
       $dd = $row2['datee'];

}
}

$output1 .= "<td>'$dd'</td>";







$output1 .= "<td>$row[class_type]</td>";

  $output1 .= "<td>$row[Room]</td>";

    $output1 .= '</tr>';
  $xx=1;
  }
}




if($xx==0){

echo '<tr> <td> SIR YOU </td> <td> HAVE NO </td><td> Upcoming </td> <td>theory CLASS</td> </tr>';


}
else

{
  $d=date("Y-m-d");



   echo $output1;

}





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




        <!-- partial:../partials/_footer.html -->


        <!-- partial -->
      </div>
    </div>

  </div>

  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/misc.js"></script>
</body>

</html>
