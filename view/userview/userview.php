
<?php


    require_once 'db.php';
  $c = $_SESSION['moukh'];


  $sql11 = "SELECT semestername FROM semesters  WHERE status=1";

           $result11 = $con->query($sql11);



        if($row = $result11->fetch_assoc())
        {

         $csem= $row["semestername"];

        }


$sql = "SELECT * FROM course_alocation WHERE faculty='$c' AND semester='$csem' AND status=1 ";


  $result = $con->query($sql);

$options = "";

while($row2 = mysqli_fetch_array($result))
{
    $options = $options."<option>$row2[coursename]$row2[course_type]</option>";

}



?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin</title>
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
      <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:../partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="../images/face.jpg" alt="">
            <p class="name">AIUB </p>
            <p class="name">CS.EDU</p>
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


              <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table center-aligned-table">



                  <table class="table">


  <tr>
  <td>
    <h1>   BOOK ROOM FOR MAKE UP CLASS : </h1>

  <br>
  <br>

</td>

<td>
	 <h1> <a href="profile.php" class="btn btn-primary btn-sm" >Back </a></h1>
</td>




</tr>

<tr>



  <td >





        <?php




require_once('../controllers/db.php');
$sql = "SELECT * FROM notice";
   $result = $con->query($sql);
  $output = '';
  while($row = $result->fetch_assoc())
  {

    $output .= '<tr>';
    $output .= "<td>$row[datee]</td>";
    $output .= "<td>$row[Topic]</td>";
    $output .= "<td>$row[Detail]</td>";

    $output .= '</tr>';
  }

?>



 <div align="center">
	<form method="post" onsubmit="return validate();" >

		<table>
			<tr>
				<td>Course Title:</td>
				<td>

<?php



if($_SESSION['fcc'] == 'ok') {

echo   $_SESSION['cname'] ;

}
else {
  ?>
  <select id="soflow-color" name = "txtCountry" id ="txtCountry" >
  <option value=""disabled hidden selected>Your Cureent Courses</option>
      <?php echo $options;?>
  </select>
<?php
//echo '<input type="text" class="form-control p_input" name="txtCountry" id="txtCountry" class="typeahead"/>';

echo '<td><label id="msg1"></label></td>';

}


 ?>



<?php echo $err['course']; ?>
				</td>
			</tr>








			<tr>
				<td>Date:</td>
				<td>
					<input onchange='this.form.submit();' type="Date" class="form-control p_input" id ="date" name="date">
					<?php echo $err['date']; ?>
				</td>
				<td><label id="msg5"></label></td>
			</tr>





			<tr>
				<td></td>

			</tr>

		</table><br><br>
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



                      <thead>
                        <tr class="text-primary">

                  <h2 align="center">Notice From Admin</h2>


                        </tr>
                      </thead>
                      <tbody>
                      	<tr>
      <th>Post Date</th>
      <th>Topics</th>
      <th>Details</th>

    </tr>

    <?php echo $output; ?>


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

  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/misc.js"></script>
</body>

</html>
