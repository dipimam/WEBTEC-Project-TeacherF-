<?php
 
$conn = mysqli_connect("localhost","root","","teacherinfo");
 
$output = '';
$query = "SELECT * FROM studentsinfo WHERE USERNAME LIKE '%".$_GET["datas"]."%'";
$result = mysqli_query($conn, $query);
$output .= '<ul class="list-unstyled">';

 if(mysqli_num_rows($result)>0) {
    
   while($row= mysqli_fetch_array($result)){
	$output .= '<li style="color:white;">'. $row["USERNAME"].'</li>';
   } 
}
else{
   $output .= 'List Not Found!';
}
  $output .='</ul>';
  echo $output;
// return ['success'=>true,'message'=> $output];
?>