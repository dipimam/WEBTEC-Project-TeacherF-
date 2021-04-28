<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "admin_db");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM user_info 
  WHERE Name LIKE '%".$search."%'
  OR Address LIKE '%".$search."%' 
  
 ";
}
else
{
 $query = "
  SELECT * FROM user_info  ORDER BY Name
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
	 <th>Id</th>
     <th>Name</th>
     <th>Address</th>
     <th>PhoneNumber</th>
     <th>Birthday</th>
     <th>Gender</th>
	 <th>Designation</th>
	 <th>password</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    
    <td>'.$row["Id"].'</td>
    <td>'.$row["Name"].'</td>
    <td>'.$row["Address"].'</td>
    <td>'.$row["PhoneNumber"].'</td>
	<td>'.$row["Birthday"].'</td>
    <td>'.$row["Gender"].'</td>
    <td>'.$row["Designation"].'</td>
	 <td>'.$row["password"].'</td>
	
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>