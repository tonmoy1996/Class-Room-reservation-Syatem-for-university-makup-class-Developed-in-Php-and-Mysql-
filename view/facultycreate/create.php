<?php


session_start();
if($_SESSION["admin"]=="block")
{


header ('Location: ../../controllers/login.php');


}
      //  view\supop.php
    //    view\adminop.php

require_once('../../controllers/db.php');


$err = ['no' => ''];

if(isset($_REQUEST['btn'])) {

      $id=$_POST['f_id'];
      $name=$_POST['f_name'];

       $pass1=$_POST['pass'];
       $conf1=$_POST['conf'];




    if($pass1 != $conf1)


    {
      $err['no'] = 'Password not matched!!';

    }

    else

    {



          $sql = "INSERT INTO  faculty VALUES (null,'$name','$id','$pass1')";
         $con->query($sql);

         header('Location: ../admin/admin.php');

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
         <div class="col-lg-4">
           <div class="card">
             <div class="card-body">
               <center>
               <h3 class="card-title text-left mb-3">Faculty Register</h3>

               <form  method="post"  action="">


                 <div class="form-group">
                   <input type="text" class="form-control p_input" placeholder="Faculty_ID" name="f_id" required >
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control p_input" placeholder="Faculty_Name" name="f_name" required>
                 </div>
                 <div class="form-group">
                   <input type="password" class="form-control p_input" placeholder="Password" name="pass" required>
                 </div>
                 <div class="form-group">
                   <input type="password" class="form-control p_input" placeholder="Repeat Password" name="conf" required><?php echo $err['no'];?>
                 </div>
                 <div class="form-group d-flex align-items-center justify-content-between">
                   <div class="form-check"><label><input type="checkbox" class="form-check-input" required>I Agree to the Terms & conditions</label></div>
                 </div>
                 <div class="text-center">
                   <button type="submit" name="btn" class="btn btn-primary btn-block enter-btn">Register</button>
                 </div>

               </form>
             </center>
             </div>
           </div>
         </div>
       </div>

   </div>


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
