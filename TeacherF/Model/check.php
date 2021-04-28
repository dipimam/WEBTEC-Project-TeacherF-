<?php
 
$conn = mysqli_connect("localhost","root","","teacherinfo");
 
if(isset($_POST["uname"])) {
  $query = "SELECT * FROM studentsinfo WHERE USERNAME ='" . $_POST["uname"] . "'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result)>0) {
      echo "<span style='color:red;'  class='status-not-available'>Username Already Exist!</span>";
  }else{
      echo "<span style='color:green;' class='status-available'></span>";
  }
}
?>