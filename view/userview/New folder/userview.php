<!DOCTYPE html>
<html>
<head>
	<title></title>

		<script type="text/javascript" src="../Model/script2.js"></script>

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
	</style>


</head>
<body>

<center>
<h1>   BOOK ROOM FOR MAKE UP CLASS : </h1>
</center>
<?php


header('Cache-Control: no cache'); //no cache

require_once('..\controllers\db.php');
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

echo   $_SESSION['Sub'] ;

}
else {

echo ' <input type="text" name="txtCountry" id="txtCountry" class="typeahead"/>
';
echo '<td><label id="msg1"></label></td>';

}


 ?>



<?php echo $err['course']; ?>
				</td>
			</tr>


			<tr>
				<td>Section:</td>
				<td>


					<?php



					if($_SESSION['fcc'] == 'ok') {

					echo   $_SESSION['SEC']  ;

					}
					else {

					
             echo ' <input type="text" name="sec" id="sec" />';

					echo '<td><label id="msg2"></label></td>';

					}


					 ?>
<?php echo $err['sec']; ?>
				</td>
			</tr>
			<tr>
				<td>Class Type: </td>
				<td>
					<select name = "type" id ="type"  >
						<option>Theory</option>
						<option>Lab</option>

					</select>
					<span>class</span>
					<?php echo $err['type']; ?>
				</td>
				<td><label id="msg3"></label></td>
			</tr>


			<tr>
				<td>Class Duration: </td>
				<td>
					<select name = "time" id ="time" >
						<option>1.5</option>
						<option>2</option>


					</select>
					<span>hours</span>
<?php echo $err['time']; ?>
				</td>
				<td><label id="msg4"></label></td>
			</tr>

			<tr>
				<td>Date:</td>
				<td>
					<input type="Date" id ="date" name="date">
					<?php echo $err['date']; ?>
				</td>
				<td><label id="msg5"></label></td>
			</tr>





			<tr>
				<td></td>
				<td><input type="submit" name="btnSubmit" value="Step 2" /></td>
			</tr>

		</table><br><br>
</br><a href="profile.php">Back To previous Page </a>

   <h2>Notice From Admin</h2>
   <table border="1">
    <tr>
      <th>Post Date</th>
      <th>Topics</th>
      <th>Details</th>

    </tr>

    <?php echo $output; ?>
  </table>


	</form>


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
