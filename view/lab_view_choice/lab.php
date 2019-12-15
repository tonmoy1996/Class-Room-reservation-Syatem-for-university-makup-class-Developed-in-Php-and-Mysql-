

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
            <p class="name">Richard V.Welsh</p>
            <p class="designation">Manager</p>
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

     	<h3> <a href="booked.php">Home Page</a></h3>
     	<br>
     	 <h3  align="center" >Available Labs:</h3>
             <div align="center">
              <div class="row mb-12">
            <div class="col-lg-4">



                  <div class=" class="btn btn-primary btn-sm"">


                    <table class="table center-aligned-table">
                      <thead>

                      </thead>
                      <tbody>
                        <tr class="">
                       	<form method ="post" action ="../controllers/finallab.php">

		<table>

			<tr>
				<td>Choose your class ::    </td>
				<td>

<?php





       require_once('../Model/lab/l.php');
?>

				</td>
			</tr>

			<tr>
				<td></td>
				<td><br><input type="submit" name="btnSubmit" value="BOOK CLASS " class="btn btn-primary btn-sm" /></td>
			</tr>

	</form>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
             </div>
          </div>
  </div>




























































            <div class="content-wrapper">

         	<h3> <a href="booked.php">Home Page</a></h3>
          <center>	 <h3  align="" >SET YOU CLASS:</h3></center>
         	<br>


           <div class="row mb-120">
                       <div class="col-lg-120 mb-1">
                         <div class="card">
           <table  border="1">


             <tbody>
               <tr>


                 <td>



















    <div class="row mb-1">
                <div class="col-lg-12 mb-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title mb-4">Basic Table</h5>
                      <table class="table">

                        <tbody>
                          <tr class="">

      <td>



                          <table class="table center-aligned-table">
                            <thead>

                            </thead>
                            <tbody>
                              <tr class="">
                              <form method="post" action="">




                                		<tr><td>	 <input  onchange='this.form.submit();' type="radio" name="T_t" value="8:00 AM" ></td><td><h4>08.00 am to 09.30 am </h4></td></tr>
                                        <tr><td>      <input  onchange='this.form.submit();' type="radio" name="T_t" value="9:30 AM"> </td><td><h4>09.30 am to 11.00 am <h4></td></tr>
                                        <tr><td>     <input  onchange='this.form.submit();' type="radio" name="T_t" value="11:00 AM"> </td><td><h4>11.00 am to 12.30 pm<h4></td></tr>

                                        <tr><td>     <input  onchange='this.form.submit();' type="radio" name="T_t" value="12:30 PM" ></td><td><h4>12.30 pm to 02.00 pm<h4> </td></tr>
                                        <tr><td>      <input  onchange='this.form.submit();' type="radio" name="T_t" value="2:00 PM"> </td><td><h4>02.00 pm to 03.30 pm <h4></td></tr>


                                        <tr><td>        <input  onchange='this.form.submit();' type="radio" name="T_t" value="3:30 PM"> </td><td><h4>03.30 pm to 05.00 pm <h4></td></tr>



      <br>




      	</form>
                              </tr>
                            </tbody>
                      </table>
                    </div>

                </div>
              </div>
            </div>
                </td>

                <td>
                <div class="col-lg-12 mb-4">
                  <div class="card">
                    <div class="card-body">

                      <table class="table table-striped" border="3">



                        <tbody>
                          <tr class="">
                          <form method ="post" action ="../controllers/fit.php">

      <table >

        <tr>
    <td></td>
          <td>

      <?php


      if(isset($_REQUEST['T_t'])) {
       # code...

         require_once('../Model/t1/t1v.php');

      }

      ?>

          </td>
        </tr>

        <tr>
          <td></td>
          <td><br><input type="submit" name="btnSubmit" value="BOOK CLASS " class="btn btn-primary btn-sm" /></td>
        </tr>

      </form>
                          </tr>
                        </tbody>
                      </table>

                                      </div>
                                   </div>
                                </div>


      </td>
      </tr>







      </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>






        </td>

            </tr>

           </tbody>
           </table>


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
