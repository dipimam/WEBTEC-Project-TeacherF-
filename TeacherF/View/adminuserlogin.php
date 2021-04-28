<!DOCTYPE HTML>  
<html lang="en" dir="ltr">
<head>
<script type="text/javascript">

      function validation()
      {
        var username= document.getElementById("username");
        var password= document.getElementById("password");

        //alert("hello");

        if(username.value.trim()=="" )
        {
           document.getElementById("nameErr").innerHTML= "*Username is requied(JS)";
		   
    

           return false;
        }

        else if(password.value.trim()=="" )
        {
           document.getElementById("passwordErr").innerHTML= "*Password is requied(JS)";
		  
    
 

           return false;
        }
        else {


          return true;
        }
      }
    </script>
  <title></title>
<style>


body{
	background-image: url("study.png");
	background-repeat: no-repeat;
	background-size: cover;
}

  h2{   
	   width: 50%;
	margin:30px auto;
	box-shadow: 0 4px 8px 5px rgba(0, 0, 0, 0.2), 
				0 6px 20px 0 rgba(0, 0, 0, 0.19);
	color: #6F1E51;}
  form{ 
        text-align: center;
        font-size: 20px;
		padding:0px 30px 30px 30px;
		
		}
		
  input{
       background-color: yellow;
  width: 20%;
  padding: 10px 20px;
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
  input::placeholder{
	text-align: center;
	font-size: 20px;
	color: white;
}
    input[type="submit"] {
     padding: 0px 20px;
    background-color: green;
    border: 2px;
    color: #fff;
    border-radius: 2px;
    margin-bottom: 4px;
	box-shadow: 0 4px 8px 0;
}
input[type=submit]:hover{
	background-color: #6F1E51;
	color: #cd6133;
	text-shadow: 2px 2px 4px;
}
  span{ font-size: 20px;
        text-align: center;  
      }

</style>
</head>
<body>  
<div><?php include 'controller/Head.php';?></div>
<?php

// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "<span style='color: red;font-size: 15px'>*Username is required</span>";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "<span style='color: red;font-size: 15px'>*Only letters, white space, period & dash is allowed</span>";
      $username = "";
          }
       else if(strlen($username)<2)
          {
           $usernameErr = "<span style='color: red;font-size: 15px'>*User Name must contain at least two (2) characters </span>";
           $username = "";

          }
     }


  if (empty($_POST["password"])) {
    $passwordErr = "<span style='color: red;font-size: 15px'>*Password is required.</span>";
  } else {
    $password = test_input($_POST["password"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php 
$msg = " ";
session_start();

$uname="Admin";
$pwd="1234";

if (isset($_POST['username'])) {
  if ($username==$uname && $password==$pwd) {
    $_SESSION['username'] = $uname;

    header("location:Dashboard.php");
  }
  else {
   
    $msg="username or password invalid";
    //echo "<script>alert('username or pass incorrect!')</script>";
  }

}

?>
<hr>

<form name="loginFrom"  class="loginbox" onsubmit="return validation();" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

    <h2>Signin</h2>


        Username: <input type="text" placeholder="Enter Username" name="username" id="username">
        <span class="error" id="nameErr">* <?php if(!empty($_GET['usernameErr'])){echo $_GET['usernameErr'];} ?></span>


        <br>
        Password: <input type="password" placeholder="Enter Password" name="password" id="password">
        <span class="error" id="passwordErr">* <?php if(!empty($_GET['passwordErr'])){echo $_GET['passwordErr'];} ?></span>
        <br>
        <input type="checkbox"  name="remember" value="remembered">
         <label for="remember">Remember Me</label>

         <input type="submit" name="submit" value="Submit">
          <meta ><a href ="forget password.php">Forget Password? </a></meta>

    </form>
<br>
<div>
<?php include 'controller/footer.php';?></div>

</div>
</body>
</html>