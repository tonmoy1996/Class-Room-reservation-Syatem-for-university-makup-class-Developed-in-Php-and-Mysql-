<?php


session_start();







 ?><!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Autocomplete with Dynamic Data Load using PHP Ajax</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>





	<style>
	.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: rgba(66, 52, 52, 0.5);color: #FFF;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:#FFF;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	}






  ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #1367ef;
  }

  li {
      float: left;
  }

  li a, .dropbtn {
      display: inline-block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
  }

  li a:hover, .dropdown:hover .dropbtn {
      background-color: while;
  }

  li.dropdown {
      display: inline-block;
  }

  .dropdown-content {
      display: none;
      position: absolute;
      background-color: #1367ef;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
  }

  .dropdown-content a {
      color: #1367ef;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
  }

  .dropdown-content a:hover {background-color: #f1f1f1}

  .dropdown:hover .dropdown-content {
      display: block;
  }






	</style>
</head>
<body>


  <ul>
  <li><a href="../../controllers/profile.php">Home</a></li>
  <li><a href="../../controllers/login.php">Log-Out</a></li>

</ul>
	<center>

  <h2>Add Your Courses</h2>
   <a href="../../controllers/profile.php"  style="color:blue;left: 600px;">Back</a>
<br>

<br>
<br>

<form class="" action="" method="post">



    <input type="text" name="txtCountry" id="txtCountry" class="typeahead"/>





  <input type="submit" name="add" id="add" >


</form>


<?php

 require_once '../../controllers/db.php';
if(isset($_REQUEST['add'])) {

$C=$_POST['txtCountry'];

$a=$_SESSION['moukh'];


$sql11 = "SELECT semestername FROM semesters  WHERE status=1";

         $result11 = $con->query($sql11);



      if($row = $result11->fetch_assoc())
      {

       $csem= $row["semestername"];

      }

  $sql = "SELECT * FROM classes WHERE CourseTitle = '$C' ";
  $result = $con->query($sql);


  while($row = $result->fetch_assoc())
  	{
      $id= $row['course_id'];
      $CC =   $row['CourseTitle'];
      $Cs =   $row['Type'];




$sql11 = "SELECT * FROM course_alocation  WHERE 	faculty='$a' AND   courseid = '$CC'  AND   course_type = '$id' AND   semester = '$csem' ";

         $result11 = $con->query($sql11);



      if($row = $result11->fetch_assoc())
      {



      }
      else {
        $sql = "INSERT INTO course_alocation VALUES (null,'$a','$id','$CC','$Cs','$csem',1)";
          $con->query($sql);
      }




header ("Location: ../asd/index.php");

}


}








 ?>

</center>



<div class="container">
   <h3 class="page-heading mb-6">Your Courses In This Semester: <h3>

  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
                        <th>ClassID</th>

                          <th>ClassTitle</th>
                          <th>ClassType</th>
                          <th>Semester</th>

      </tr>
    </thead>
    <tbody>
      <tr>
          <?php
     $a=$_SESSION['moukh'];

     $sql11 = "SELECT semestername FROM semesters  WHERE status=1";

              $result11 = $con->query($sql11);



           if($row = $result11->fetch_assoc())
           {

            $csem= $row["semestername"];

           }
                          require_once '../../controllers/db.php';
                          $sql = "SELECT * FROM  course_alocation  WHERE faculty='$a' AND semester='$csem'";
                          $result = $con->query($sql);
                          $output = '';
                          while($row =$result->fetch_assoc())
                          {
                            $output .= '<tr>';
                            $output .= "<td>$row[courseid]</td>";

                            $output .= "<td>$row[coursename]</td>";
                            $output .= "<td>$row[course_type]</td>";
                            $output .= "<td>$row[semester]</td>";

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







</body>
<script>
    $(document).ready(function () {
        $('#txtCountry').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server.php",
					data: 'query=' + query,
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>
</html>
