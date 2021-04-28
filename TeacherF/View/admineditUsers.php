<?php if(!empty($_GET['id'])){ ?>
<?php 

require_once 'controller/userinfo.php';
$tableName = 'user_info';
$users = fetchuser($_GET['id']);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
  <style>
  body{
	background-image: url("study.png");
	background-repeat: no-repeat;
	background-size: cover;
}
  
  form{ padding-top: 20px;
        text-align: center;
        font-size: 20px;}
  input{
       
	background-color: #AED6F1;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border:none;
  border-radius: 10px;
  box-sizing: border-box;
  text-transform: capitalize;
  text-align: center;
  font-size: 17px;
 box-shadow: inset 0 0 10px black;
  }
    legend{
      font-size: 25px;
    }
  body{
    margin-top: 100px;
             margin-left: 300px;
             margin-right: 500px;
  }
  </style>
</head>
<body>

<form action="controller/editUsersController.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
<fieldset>
<legend><B>Edit User</B></legend> <br> 

  Name
  <br><input type="text" name="name" size="40" value="<?php echo $users['Name']; ?>">
  <br><br>
  Address
  <br><input type="text" name="address" size="40" value="<?php echo $users['Address']; ?>">
  <br><br>
  Designation
  <br><input type="text" name="designtion" size="40" value="<?php echo $users['Designation']; ?>">
  <br><br>
  Password
  <br><input type="text" name="password" size="40" value="<?php echo $users['Password']; ?>">
  <br><br><hr>
  <input type="submit" name="submit" value="Save">
</form>

</fieldset>
</body>
</html>
<?php }
else{
  echo "You are not allowed to visit this page";
} ?>