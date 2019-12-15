<?php

session_start();
if($_SESSION["admin"]=="block")
{


header ('Location: ../../controllers/login.php');


}

//add new semester

  require_once('../../controllers/db.php');

$sql = "SELECT * FROM  semesters";


  $result = $con->query($sql);

$options = "";

while($row2 = mysqli_fetch_array($result))
{
    $options = $options."<option>$row2[semestername]</option>";
}




if(isset($_REQUEST['button'])){

  require_once('../../controllers/db.php');

     $current=$_POST['csem'];




//current semester status  0
   $sql = " UPDATE semesters SET status=0 WHERE status=1 ";


  if ($con->query($sql) === TRUE) {

} else {
    echo "Error updating record: ";
}








//set input semester status  1


     $sql = " UPDATE semesters SET status=1 WHERE semestername='$current' ";


  if ($con->query($sql) === TRUE) {

} else {
    echo "Error updating record: ";
}



header ('Location: nw.php');

}





if(isset($_REQUEST['btn'])) {


  require_once('../../controllers/db.php');

	            $sem=$_POST['sem'];

              $time  = date("Y-m-d");

			        $date  = strtotime($time);

		          $year  = date('Y',$date);




                $conn=$sem."-".$year;




              $sql = "SELECT * FROM  semesters where semestername='$conn'";


                $result = $con->query($sql);

              if($row2 = mysqli_fetch_array($result))
              {




              }
                else {
                   $sql = "INSERT INTO semesters VALUES (null,'$conn',0)";
                               $con->query($sql);


                            header ('Location: nw.php');

                            }
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
          <h3 class="page-heading mb-4">Add New Semester And Year:</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

</br>









                <table>
                        <tr>
                        <td>

                       <h4 class="card-title mb-4" >Current Running Semester :</h4>

                        </td>
                        <td>
                        	<?php

                  require_once('../../controllers/db.php');

                   $sql = "SELECT semestername FROM  semesters  WHERE status=1";



                	     $result = $con->query($sql);



                    while($row = $result->fetch_assoc())
                    {

                    	echo '<h4 class="card-title mb-4" >'.$row["semestername"].'</h4>';
                    }



                	?>




                        </td>


                        </tr>

                        <form class="form-group" method="post" action="">

              <tr>

                      <td>
                     <h4 class="card-title mb-4" >Set Current Semester:</h4>
                    </td>



                    <td >

                <select id="soflow-color" name = "csem" id ="csem" >
          <option value=""disabled hidden selected>Current Selected Semester</option>
                    <?php echo $options;?>
                </select>
                 </td>

                 <td>
                    <input type="submit" class="btn btn-primary" name="button" value="Set Current Semester">

                  </td>





              </tr>
              </form>


                	<tr>

                		<td>
                		 <h4 class="card-title mb-4" >Add Semester:</h4>
                		</td>

                		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                				<h4 class="card-title mb-4" >Year:</h4>

                		</td>
                	   </tr>

            <form class="form-group" method="post" action="">
                      <tr>
                		<td>

        <select id="soflow-color" name = "sem" id ="sem" >
  <option value=""disabled hidden selected>Chose Semester</option>
  <option value="Fall">Fall</option>
  <option value="Summer">Summer</option>
  <option value="Spring">Spring</option>
</select>

                		</td>



                			<td>
                				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                				<?php

                				    $time  = date("Y-m-d");

                				    $date  = strtotime($time);

                					$year  = date('Y',$date);

                					echo '<h4 class="card-title mb-4" >'.$year.'</h4>' ;




                				?>



                			</td>


                </tr>
                <tr>
                	<td></td>

                	<td>
                		<br>
                		<br>

                		<input type="submit" class="btn btn-primary" name="btn" value="Add New Semester">

                	</td>

                </tr>


                </table>
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
