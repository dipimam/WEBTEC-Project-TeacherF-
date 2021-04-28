



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title></title>
	
	
	
	
	
	<style>


body{
	background-image: url("das.jpg");
	background-repeat: no-repeat;
	background-size: cover;
}






.das{
	
	height: 250px;
	padding-top: 20px;
}
.das a{
	color: white;
	font-size: 10px;
	text-transform: uppercase;
	font-weight: bold;
	text-decoration: none;
	padding:13px 12px;
	background-color: #229954;
	text-align: center;
	border-radius: 7px;
	margin-left: 5px;
}
.das a:hover{
	background-color: #e74c3c;
}
</style>



	
	
</head>
<body>





    <div><?php include 'controller/Head.php';?></div>
<header>
<?php 
session_start();

if (empty($_SESSION['username'])) {
    header("location:userlogin.php");
    
}

else{
    echo "<div style='float: right';>"." Logged in as ".$_SESSION['username']." | ";
    echo "<a href='controller/Logout.php'>Logout</a>" ;
    echo "</div><br><br><hr><br>";
   
}

 ?>
</header>
<table action =" " style="width:100%; border: 2px solid black;">
  <tr style="border: 2px solid black;">
    <th style="border: 2px solid black;">

    	Dashboard<hr>
		
    	<div class="das">
    	<li> <a href="addStudent.php">Add Student</a></li><br><br>
    	<li><a href="addTeacher.php">Add Teacher</a></li><br><br>
        <li><a href="showallusers.php">Show All Student & Teacher</a></li><br><br>
    	<li><a href="controller/Logout.php">Logout</a></li><br><br>
		
		
		
		
		
   
   
   <br />
   <div id="result"></div>
		
		
  
    </div>
    </th>
    <th style="border: 1px black;"><?php if (isset($_SESSION['username'])) {
	echo "<div style= 'margin-right: 850px;font-size: 30px;'> Welcome ".$_SESSION['username']."</div>";

}

?>

</th>
  </tr> 
</table>

<div><?php include 'controller/footer.php';?></div><hr>

</body>
</html>

