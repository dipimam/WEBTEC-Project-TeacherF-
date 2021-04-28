<?php

session_start();
require_once '../Controller/teacherInfoController.php';
$data = fetchStudent($_SESSION['username']);
if($data!=NULL)
{
  foreach ($data as $i => $student):

       $name= $student['NAME'] ;
       $email=$student['EMAIL'];
       $birth=$student['BIRTH'];
       $gender= $student['GENDER'] ;
  endforeach;
$birth=str_replace('/','', $birth );
$birthDate=$birth[0].$birth[1];
$birthMonth=$birth[2].$birth[3];
$birthYear=$birth[4].$birth[5].$birth[6].$birth[7];


}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script src="../JS/jsvalidation.js" type="text/javascript"></script>
  <script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "namesuggestion.php?q=" + str, true);
        xmlhttp.send();
    }
}
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "changePasswordTeacherView.php", true);
  xhttp.send();
}
</script>
 
<style type="text/css">
  button{
      padding: 3px 20px;
    background-color: black;
    border: 8px;
    color: #fff;
    border-radius: 8px;
    }
    body {
  margin: 50px;
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('../Sources/dashboardcover.jpg');
  background-repeat: no-repeat;
  background-size: 1550px 780px;

}
    .box{
      text-align: center;
  background-color: rgba(0,0,0,0.8);
  width: 40%;
  font-size: 18px;
  margin-top: 120px;
  margin-left: 600px;
  margin-right: 200px;
  border-radius: 10px;
  border: 1px soid rgba(255,255,255,0.3);
  box-shadow: 1px 1px 5px rgba(0,0,0,0.3);
  color: #fff;
    }
    .sidenav {
  height: 95%;
  margin-top: 55px;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
}


/* Side navigation links */
.sidenav a {
  color: white;
  padding: 20px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
.sidenav a:hover {
  background-color: #ddd;
  color: black;
}
</style>
</head>
<body>
<div><?php include("headerView.php"); ?></div>
<?php

  echo "<div class='sidenav'>";

 echo "<br><a href='dashboardTeacherView.php'>Dashboard</a>";
 echo "<br><a href='viewProfileTeacherView.php'>View Profile</a>";
 echo "<br><a href='editProfileTeacherView.php'>Edit Profile</a>";
 echo "<br><a href='giveAd.php'>Post</a>";
  echo "<br><a href='changePasswordTeacherView.php'>Change Password</a>";
  echo "<br><a href='picture.php'>Change Picture</a>";
  echo "<br><a href ='../Controller/logoutTeacherController.php'>Logout </a>";
  echo "</div>";
  
?>
<div class="box">
 <form action="../Controller/updateTeacherController.php" method="POST" enctype="multipart/form-data">
  <h1>Edit Profile</h1><hr><br>
  <label for="name">Name:</label>
  <input value="<?php echo $name ?>" type="text" id="name" name="name" onkeyup="showHint(this.value)"  onkeyup="checkName()" onblur="checkName()">
  <br>
  <span class="error" id="nameErr" ><?php if (!empty($_GET['nameErr'])) {echo $_GET['nameErr'];} ?> </span>
  <br><p>Suggestions: <span id="txtHint"></span></p>
  <br>
  <label for="email">Email:</label>
  <input value="<?php echo $email ?>" type="text" id="email" name="email"  onkeyup="checkEmail()" onblur="checkEmail()">
  <br>
  <span class="error" id="emailErr" ><?php if (!empty($_GET['emailErr'])) {echo $_GET['emailErr'];} ?> </span>
  <br><br>
  <label for="birth"> Date of Birth:</label><br>
   <input value="<?php echo $birth ?>" type="date" id="birth" size="1" name="birth"  onkeyup="checkDOB()" onblur="checkDOB()"><br>
  <span class="error" id="birthErr" ><?php if (!empty($_GET['birthErr'])) {echo $_GET['birthErr'];} ?> </span> <br><br>
  <input type="submit" name = "updateStudent" value="Update">
  <input type="reset"><br><br>
  <div id="demo">
<button type="button" onclick="loadDoc()">Change Password</button>
</div>
</form>
</div>
</body>
</html>
