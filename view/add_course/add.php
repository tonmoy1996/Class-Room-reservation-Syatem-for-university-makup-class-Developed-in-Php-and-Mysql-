
<?php

session_start();
if($_SESSION["admin"]=="block" )
{


header ('Location: ../../controllers/login.php');


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
            <a class="nav-link profile-pic" href="#"><img class="rounded-circle" src="../../images/logo_star_black.png" alt=""></a>
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
          <h3 class="page-heading mb-4">Add New Course</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

</br>







                 <div align="center">
                <form  class="form-group" method="post" action="new.php">

                <table>
                        <tr>

                       <td>   <h4>ClassId:</h4></td>


                        <td>

             <input type="text" name="c_id"  placeholder="ClassId">


                        </td>


                        </tr>



                          <tr>

                       <td>   <h4>CourseTitle:</h4></td>


                        <td>

             <input type="text" name="title"  placeholder="CourseTitle">


                        </td>


                        </tr>
                          <tr>

                       <td>   <h4 align="left">Section:</h4></td>


                        <td>

             <input type="text" name="sec"  placeholder="Section">


                        </td>


                        </tr>





              <tr>

                      <td>
                     <h4 class="card-title mb-4" >CourseType:</h4>
                    </td>



                    <td >

                      <select id="soflow-color" name ="type" id ="type" >
                        <option value=""disabled hidden selected>Choose Type</option>
                        <option value="Theory">Theory</option>
                        <option value="Lab">Lab</option>

                      </select>
                 </td>


              </tr>


              <tr>

                      <td>
                     <h4 class="card-title mb-4" >Day:</h4>
                    </td>



                    <td >

                      <select id="soflow-color" name ="day" id ="day" >
                        <option value=""disabled hidden selected>Choose Day</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                         <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                         <option value="Thrusday">Thrusday</option>


                      </select>
                 </td>


              </tr>



                    <tr>

                       <td>   <h4 align="left">Starting Time:</h4></td>


                        <td>
         <input type="text" name="stime"  placeholder="StartTime">
                        </td>






                        </tr>






                    <tr>

                       <td>   <h4 align="left">Ending Time:</h4></td>


                        <td>

         <input type="text" name="etime"  placeholder="EndTime">



                        </td>









                        </tr>







                    <tr>

                       <td>   <h4 align="left">Room Number:</h4></td>


                        <td>

             <input type="text" name="room"  placeholder="Room">


                        </td>


                        </tr>




                         <tr>
                          <td></td>
                       <td><br><br>
                          <input type="submit" name="submit" value="submit" class="btn btn-primary"/>
                          </td>
                         </tr>





                   </table>



              </form>
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
