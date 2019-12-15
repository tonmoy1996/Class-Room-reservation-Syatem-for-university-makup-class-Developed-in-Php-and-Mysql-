<?php
  session_start();
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
            <a class="nav-link profile-pic" href="../controllers/profile.php"><img class="rounded-circle" src="../images/face.jpg" alt=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../controllers/profile.php"><i class="fa fa-th"></i></a>
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

          <div align="center">


             <table>
               <tr>
                 <td>
                   <h2 style="pad: 100px">  YOUR COURSES IN THIS SEMESTER :</h2>
                 </td>

            <td >
              <a href="profile.php"  style="color:blue;margin-left:200px;">Back</a>
            </td>


            </tr>




          </table>

          </div>



















           <table class="table center-aligned-table">
             <tr>

             </tr>
             <tr class="text-primary">
               <th>Course ID</th>
               <th>Course Name</th>
               <th>Course Type</th>
               <th>Date</th>
               <th>Options</th>

             </tr>
             <?php



           if(isset($_REQUEST['add22'])){

           $cv=$_POST['dateee'];

           $_SESSION['cdate']=$cv;

             require_once '../controllers/db.php';


             $sql11 = "SELECT semestername FROM semesters  WHERE status=1";

                      $result11 = $con->query($sql11);



                   if($row = $result11->fetch_assoc())
                   {

                    $csem= $row["semestername"];

                   }
             $xxxx=0;



           $c = $_SESSION['moukh'];

             $sql12 = "SELECT * FROM 	course_alocation where faculty='$c' AND semester='$csem'";
             $result12 = $con->query($sql12);
             $output1 = '';
             while($row =$result12->fetch_assoc())
             {
                     $z=0;


               $o= $row['courseid'];
$t=$row['course_type'];
                 $sql = "SELECT * FROM classes WHERE course_id = '$o' ";
                 $result = $con->query($sql);


                 if($row = $result->fetch_assoc())
                   {



                     $we = date('l', strtotime($cv)); // note: first arg to
                     //echo $weekday; // SHOULD display Wednesday

                    $day = $row['Day'];

            if($we==$day){



               $z=1;

                 }

                 }




                     if($z==1)

               {
               $output1 .= '<tr>';
               $output1 .= "<td>$o</td>";



               $sql = "SELECT * FROM classes WHERE course_id = '$o' ";
               $result = $con->query($sql);


               if($row = $result->fetch_assoc())
                 {

             $output1 .= "<td>$row[CourseTitle]</td>";


               }

                  $output1 .= "<td>$t</td>";
                   $output1 .= "<td>'$cv'</td>";




$b=$_SESSION['cdate'];

                   $sql112 = "SELECT * FROM canceled_classes  WHERE  course_id='$o' AND semester ='$csem' AND	datee ='$b'";

                        $result112 = $con->query($sql112);



                     if($row2 = $result112->fetch_assoc())
                     {

                       //$output1 .= "<td><a href='demo.php?did=$o' class='btn btn-danger btn-sm'>Cancel A Class</a></td>";
                       $output1 .= "<td><a href='b.php?did=$row2[id]' class='btn btn-primary btn-sm'>Book  Room</a></td>";

}

else {
$output1 .= "<td><a href='demo.php?did=$o' class='btn btn-danger btn-sm'>Cancel Class</a></td>";
}




                  $output1 .= '</tr>';
                 $xxxx=1;

           }
             }


           //  mysqli_close($con);



           if($xxxx==0){

           echo '<tr>  SIR YOU  Have Not Added Any Clases Yet In The Semester  </tr>';


           }
           else


           {




              echo $output1;

           }




           }




             ?>

          <?php


          if ($_SESSION['vai']=="allok") {







          $cv=$_SESSION['again'];

          $_SESSION['cdate']=$cv;

           require_once '../controllers/db.php';



           $xxxx=0;



          $c = $_SESSION['moukh'];

          $sql11 = "SELECT semestername FROM semesters  WHERE status=1";

                   $result11 = $con->query($sql11);



                if($row = $result11->fetch_assoc())
                {

                 $csem= $row["semestername"];

                }

           $sql12 = "SELECT * FROM 	course_alocation where faculty='$c' AND semester='$csem' ";
           $result12 = $con->query($sql12);
           $output1 = '';
           while($row =$result12->fetch_assoc())
           {
                   $z=0;


             $o= $row['courseid'];
             $t=$row['course_type'];

               $sql = "SELECT * FROM classes WHERE course_id = '$o' ";
               $result = $con->query($sql);


               if($row = $result->fetch_assoc())
                 {



                   $we = date('l', strtotime($cv)); // note: first arg to
                   //echo $weekday; // SHOULD display Wednesday

                  $day = $row['Day'];

if($we==$day){



             $z=1;

}

               }




     if($z==1)

             {
             $output1 .= '<tr>';
             $output1 .= "<td>$o</td>";


             $sql = "SELECT * FROM classes WHERE course_id = '$o' ";
             $result = $con->query($sql);


             if($row = $result->fetch_assoc())
               {

           $output1 .= "<td>$row[CourseTitle]</td>";


             }

             $output1 .= "<td>$t</td>";
         $output1 .= "<td>'$cv'</td>";


         $b=$_SESSION['cdate'];

                            $sql112 = "SELECT * FROM canceled_classes  WHERE  course_id='$o' AND semester ='$csem' AND	datee ='$b'";

                                 $result112 = $con->query($sql112);



                              if($row2 = $result112->fetch_assoc())
                              {

                                //$output1 .= "<td><a href='demo.php?did=$o' class='btn btn-danger btn-sm'>Cancel A Class</a></td>";
                                $output1 .= "<td><a href='b.php?did=$row2[id]' class='btn btn-primary btn-sm'>Book  Room</a></td>";

         }

         else {
         $output1 .= "<td><a href='demo.php?did=$o' class='btn btn-danger btn-sm'>Cancel Class</a></td>";
         }

             $output1 .= '</tr>';
         $xxxx=1;

         }
           }


         //  mysqli_close($con);

          //  mysqli_close($con);



          if($xxxx==0){

          echo '<tr>  SIR YOU  Have Not Added Any Clases Yet In The Semester  </tr>';


          }
          else


          {




            echo $output1;

          }




          }



          ?>






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
