<?php  
require_once 'controller/userinfo.php';

$user = fetchuser($_GET['id']);

?>
<!DOCTYPE html>
<html>
<head>
	<style>
    .error {
        color: #FF0000;
    }
    h2{
       text-align: center; }
  form{ padding-top: 20px;
        text-align: center;
        font-size: 20px;}
  input{
       padding: 5px 12px;
       border: 1px solid #ddd;
       border-radius: 2px;
       background-color: #fff;
       box-shadow: inset 1px 1px 5px rgba(0,0,0,0.2);
  }
th{
    background-color: black;
    color: white;
    font-family: Arial;
    font-size: 18px;
  }
  span{ font-size: 15px;
        text-align: center;  
      }
    </style>
</head>
<body>


 <div><?php include 'controller/Head.php';?></div>
<?php 
session_start();

if (empty($_SESSION['username'])) {
    header("location:userlogin.php");
    
}

else{
    echo "<div style='float: right';>"." Logged in as ".$_SESSION['username']." | ";
    echo "<a href='Dashboard.php'>Dashboard</a> | " ;
    echo "<a href='controller/Logout.php'>Logout</a>" ;
    echo "</div><br><br><hr><br>";
   
}

 ?>
    <hr>
    <form style="border: 5px;margin-top: 10px;margin-bottom: 0px; margin-left: 300px;margin-right: 300px;border-style: solid;border-color: black;padding: 1em;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
      <h1><span style="font-weight: bold;font-size: 25px;">Personal Information </span></h1>  <hr>
<table>
	<tr>
      <th>&nbsp;&nbsp;Name&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;Address&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;Phone Number&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;Date of Birth&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;Designation&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;Gender&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;Password&nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp;Action&nbsp;&nbsp;</th>
    </tr>
	<tr>
		<td><a href="showuser.php?id=<?php echo $user['Id'] ?>"><?php echo $user['Name'] ?></a></td>
		<td><?php echo $user['Address'] ?></td>
		<td><?php echo $user['PhoneNumber'] ?></td>
		<td><?php echo $user['Birthday'] ?></td>
		<td><?php echo $user['Designation'] ?></td>
		<td><?php echo $user['Gender'] ?></td>
    <td><?php echo $user['Password'] ?></td>
		<td><a href="editUsers.php?id=<?php echo $editUsers['ID'] ?>">Edit</a>&nbsp<a href="controller/deleteUsers.php?id=<?php echo $product['ID'] ?>">Delete</a></td>
	</tr>

</table>
</form>
<div><?php include 'controller/footer.php';?></div>
</body>
</html>