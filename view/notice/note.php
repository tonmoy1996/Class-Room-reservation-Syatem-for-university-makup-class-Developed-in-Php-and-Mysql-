

<?php



 if(isset($_REQUEST['submit'])) {

   $topic=$_POST['topic'];
   $message=$_POST['message'];
   $mdate=date("Y-m-d");

echo $topic;


   $sql = "INSERT INTO notice VALUES (null,'$topic','$message','$mdate')";
     $con->query($sql);


    header('Location: note.php');


  }



?>




<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body >
  <div align='center'>
    <form method="post" action="Anotice.php">
      <table>
      <tr><td>Topics:</td>

        <td> <a href="admin.php"  style="color:blue;;">Back</a></td>


      </tr>
      <tr>

        <td>
          <input type="text" name="topic">

        </td>
      </tr>
       <tr>

        <td>
          <span>Details:</span>
        </td>
      </tr>
      <tr>

        <td>
          <textarea name="message" rows="5" cols="100"></textarea>
        </td>
      </tr>


      <tr>
        <td>
          <input type="submit" name="submit" value="submit">
        </td>

      </tr>



    </table>



    </form>





  <h2>Notice:</h2>

  <table border="1">
    <tr>
      <th>Date</th>
      <th>Topics</th>
      <th>Details</th>
      <th>Options</th>
    </tr>

    <?php

    require_once '../controllers/db.php';
    $sql = "SELECT * FROM notice";
    $result = $con->query($sql);
    $output = '';
    while($row =$result->fetch_assoc())
    {
      $output .= '<tr>';
      $output .= "<td>$row[datee]</td>";
      $output .= "<td>$row[Topic]</td>";
      $output .= "<td>$row[Detail]</td>";

      $output .= "<td><a href='delete.php?did=$row[id]'>Delete</a></td>";
      $output .= '</tr>';
    }


    mysqli_close($con);




    echo $output;

    ?>
  </table>
  </div>
</body>
</html>
