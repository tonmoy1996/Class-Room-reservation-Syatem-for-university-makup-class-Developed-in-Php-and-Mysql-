<?php




if(isset($_REQUEST['T_t'])) {
$b_date= $_SESSION['date'];

     require_once('../controllers/db.php');
require_once('makec.php');
chekthesed($b_date);


 	$b_day= $_SESSION['day'];
 	$b_time= $_POST['T_t'];
   // $b_date= $_SESSION['date'];


    $_SESSION["T_t"] = $b_time;


     $sql11 = "SELECT semestername FROM semesters  WHERE status=1";

              $result11 = $con->query($sql11);



           if($row = $result11->fetch_assoc())
           {

            $csem= $row["semestername"];

           }


if ($b_day != 'Friday' ){



switch ($b_time) {
    case "8:00 AM":
        $sql = "SELECT  DISTINCT Room FROM classes WHERE (semester='$csem' AND  Type ='Theory' AND Day='$b_day' AND  (StartTime ='$b_time'OR StartTime = '9:30 AM'))";
        break;
    case "10:00 AM":
        $sql = "SELECT  DISTINCT Room FROM classes WHERE (semester='$csem' AND Type ='Theory' AND Day='$b_day' AND (StartTime ='$b_time' OR StartTime ='9:30 AM' OR StartTime = '11:00 AM'))";
        break;
    case "12:00 PM":
      $sql = "SELECT  DISTINCT Room FROM classes WHERE (semester='$csem' AND Type ='Theory' AND Day='$b_day' AND (StartTime ='$b_time' OR StartTime ='11:00 AM' OR  StartTime = '12:30 PM'))";
        break;
        case "2:00 PM":
        $sql = "SELECT  DISTINCT Room FROM classes WHERE (semester='$csem' AND Type ='Theory' AND Day='$b_day' AND (StartTime ='$b_time' OR StartTime ='3:30 PM' ))";
        break;
    case "4:00 PM":
        $sql = "SELECT  DISTINCT Room FROM classes WHERE (semester='$csem' AND Type ='Theory' AND Day='$b_day' AND (StartTime ='$b_time' OR  StartTime = '3:30 PM'))";
        break;


}






	$result = $con->query($sql);

    $x1 = 0;

	while($row = $result->fetch_assoc())
	{



   $rta[$x1] = $row['Room'];
	//echo $rta[$x]; echo '<br>';
	//echo $row['Room'];
	//echo '<br>';
             $x1=$x1+1;;
}


}

else {

 $rta[1] = 'moukh';


}




// echo $b_date ;





$sql1 = "SELECT  DISTINCT Room FROM classes where semester='$csem' AND Type ='Theory'";

	$result1 = $con->query($sql1);

    $xx = 0;

	while($row1 = $result1->fetch_assoc())
	{



   $rAa[$xx] = $row1['Room'];
	//echo $rAa[$xx];
	// echo '<br>';
	//echo $row1['Room'];
	//echo '<br>';
      $xx = $xx+1;
}








 $sql2 = "SELECT * FROM booking WHERE (datee ='$b_date' AND  timee ='$b_time' AND semester='$csem')";

	$result2 = $con->query($sql2);

    $x2 = 0;

	while($row2 = $result2->fetch_assoc())
	{



   $r22[$x2] = $row2['Room'];
	//echo $rta[$x]; echo '<br>';
	//echo $row2['Room'];
	//echo '<br>';
             $x2=$x2+1;;

}
if ($xx==0) {
  $rta[0]='0';
}


if($x2 == 0){


if ($x1 == 0) {
  $rta[0]='0';
}



$complex = array_diff($rAa,$rta);
$as = sizeof($rta) + sizeof($rAa);



}
else {
  $complex = array_diff($rAa,$rta,$r22);


  $as = sizeof($rta) + sizeof($rAa)  + sizeof($r22);
}



  //  $complex = array_diff($rAa,$rta);
  //  $as = sizeof($rta) + sizeof($rAa);

//$as = sizeof($rta) + sizeof($rAa);
//echo $as;
//echo ' <br> ';
rsort($complex);
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<table border="3">';

echo '<tr>';
echo  '<td> </td>
<td> ROOM  </td> <td> DETAIL   </td>';
echo '</tr>';

if($as<7){}
  else {
    $as=7;
  }
for($y = 0; $y < $as ; $y++)

{
if(empty($complex[$y])){
//    echo "NULL"; echo $y;echo '<br>';
}
else {


  echo  '<tr><td><input type="radio" name="labf" value="'.$complex[$y].'"> </td>
  <td>  '.$complex[$y].'</td>';

$varr = $complex[$y];
if(( strlen($varr) == 3) && (substr($varr, 0, 1)  == '5'))

{

 echo "<td> - IS IN CAMPUS 5 (BANANI)  </td>";

}

elseif(( strlen($varr) == 3) && (substr($varr, 0, 1)  == '1'))

{

 echo "<td> - IS IN CAMPUS 1 (BANANI)  </td>";

}


else {

echo "<td> - IS IN Parmanent CAMPUS  </td>";


}


echo '</tr>';
}
}

echo '</table>';

	}



?>
