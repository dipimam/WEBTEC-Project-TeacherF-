<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="../JS/jsvalidation.js" type="text/javascript"></script>

    <style >
      .error {color: #FF0000;}
      .box{
        max-width: 600px;
        
        margin-top: 100px;
        font-family: Arial, sans-serif;
      }
      body{
      background-image: url('../Sources/login.webp');
      background-repeat: no-repeat;
            background-size: 1550px 700px;
    }
    </style>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/formStyle.css">
  </head>
  <body>


<div><?php include("headerView.php"); ?></div>

<div class="box">
    <form  method="post" action="../Controller/loginTeacherController.php">
<h2>Login</h2><hr> <br>


        <a>User Name:</a> <input type="text" name="username" id="username" placeholder="Enter Your Username" onkeyup="checkUsername()" onblur="checkUsername()" >
        <span class="error" id="usernameErr"><?php if (!empty($_GET['usernameErr'])) {echo $_GET['usernameErr'];} ?> </span>
        <br><br>
        <a>Password:</a> <input type="text" name="password" id="password" placeholder="Enter Your Password" onkeyup="checkPass()" onblur="checkPass()" >
        <span class="error" id="passwordErr" ><?php if (!empty($_GET['passwordErr'])) {echo $_GET['passwordErr'];} ?> </span>

        
        <br>
        
         <input type="submit" name="submit" value="Submit">
          <meta ><a href ="forget password.php">Forget Password? </a></meta>

    </form></div>
  </body>
</html>
