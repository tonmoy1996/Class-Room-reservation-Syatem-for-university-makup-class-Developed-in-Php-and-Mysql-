<?php



require_once('../controllers/db.php');
$sql11 = "SELECT semestername FROM semesters  WHERE status=1";

              $result11 = $con->query($sql11);



           if($row = $result11->fetch_assoc())
           {

            $csem= $row["semestername"];

           }



if(isset($_REQUEST['lab_t'])) {
$b_date= $_SESSION['date'];
     require_once('../controllers/db.php');

require_once('makec.php');
chekthesed($b_date);





 	$b_day= $_SESSION['day'];
 	$b_time= $_POST['lab_t'];


$_SESSION["lab_t"] = $b_time;




if ($b_day != 'Friday' ){
  $sql = "SELECT  DISTINCT Room FROM classes WHERE (semester='$csem' AND  Type ='Lab' AND Day='$b_day' AND  StartTime='$b_time')";

	$result = $con->query($sql);

    $x1 = 0;

	while($row = $result->fetch_assoc())
	{



   $rta[$x1] = $row['Room'];

             $x1=$x1+1;;
}

}

else {

 $rta[1] = ' moukh';


}










$sql1 = "SELECT  DISTINCT Room FROM classes where semester='$csem' AND Type ='Lab'";

	$result1 = $con->query($sql1);

    $xx = 0;

	while($row1 = $result1->fetch_assoc())
	{



   $rAa[$xx] = $row1['Room'];

      $xx = $xx+1;
}








 $sql2 = "SELECT * FROM booking WHERE (datee ='$b_date' AND  timee ='$b_time' AND semester='$csem')";

	$result2 = $con->query($sql2);

    $x2 = 0;

	while($row2 = $result2->fetch_assoc())
	{



   $r22[$x2] = $row2['Room'];

             $x2=$x2+1;;

}


if ($xx==0) {
  $rta[0]='0';
}



if($x2 == 0){

  if ($x1==0) {
    $rta[0]='0';
  }
  $complex = array_diff($rAa,$rta);
  $as = sizeof($rta) + sizeof($rAa);
}


  else {


    $complex = array_diff($rAa,$rta,$r22);


    $as = sizeof($rta) + sizeof($rAa)  + sizeof($r22);
  }



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
for($y = 0; $y < $as ; $y++)

{
if(empty($complex[$y])){
//    echo "NULL"; echo $y;echo '<br>';
}
else {

    echo '<tr>';
  echo  '<td><input type="radio" name="labf" value="'.$complex[$y].'"> </td>
  <td>  '.$complex[$y].'</td>';

$varr = $complex[$y];

if( substr($varr, 0, 1)  == '3')

{

 echo "<td> - IS A COMPUTER LAB  </td>";

}

elseif( substr($varr, 0, 1)  == '2')

{

 echo "<td> - IS A ELECTRICAL LAB </td>";

}
elseif( substr($varr, 0, 1)  == '6')

{

 echo "<td> - IS A DEGINE STUDIO   </td>";

}
elseif( substr($varr, 0, 1)  == 'C')

{

 echo "<td> - IS A CHEMISTRY LAB  </td>";

}

else

{

 echo "<td> - IS A OTHER LAB  </td>";

}




echo '</tr>';


}
}

echo '</table>';


}

?>
