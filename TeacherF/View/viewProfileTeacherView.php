<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style type="text/css">
    body {
  margin: 50px;
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('../Sources/dashboardcover.jpg');
  background-repeat: no-repeat;
  background-size: 1550px 780px;

}
    .inline{
      margin-top: 190px;
  background-color: rgba(0,0,0,0.8);
  width: 40%;
  padding-top: 30px;
  padding-bottom: 20px;
  font-size: 18px;
  margin-left: 580px;
  margin-right: 200px;
  border-radius: 10px;
  border: 1px soid rgba(255,255,255,0.3);
  box-shadow: 1px 1px 5px rgba(0,0,0,0.3);
  color: #fff;

    }
    .sidenav {
  height: 95%;
  margin-top: 60px;
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

    a{
      font-size: 20px;
      font-weight: bold;
      color: aqua;
    }
    span{
      font-size: 20px;
    }
  </style>
</head>
<body>
      <div><?php include('headerView.php'); ?></div>
      <div><?php include '../Sources/AccountDesign.php';?></div>
<?php
session_start();
require_once '../Controller/teacherInfoController.php';



if(isset($_SESSION['username']))
{
$data = fetchStudent($_SESSION['username']);


  if($data!=NULL)
  {
    foreach ($data as $i => $student):

         $name= $student['NAME'] ;
         $email=$student['EMAIL'];
         $username= $student['USERNAME'] ;
         $birth=$student['BIRTH'];
         $gender= $student['GENDER'] ;
          $image=$student['IMAGE'];
    endforeach;

echo "<div class='sidenav'>";

 echo "<br><a href='dashboardTeacherView.php'>Dashboard</a>";
 echo "<br><a href='viewProfileTeacherView.php'>View Profile</a>";
 echo "<br><a href='editProfileTeacherView.php'>Edit Profile</a>";
 echo "<br><a href='giveAd.php'>Post</a>";
  echo "<br><a href='changePasswordTeacherView.php'>Change Password</a>";
  echo "<br><a href='picture.php'>Change Picture</a>";
  echo "<br><a href ='../Controller/logoutTeacherController.php'>Logout </a>";
  echo "</div>";


  echo"<div class='inline' >";
echo '
<center
<tr>
<td>
<img src="data:image/jpeg;base64,'.base64_encode($image ).'" height="280" width="250" class="img-thumnail" />
</td>
</tr>
</center>
';   
  echo"<div style='text-align:center; ' >";
    echo "<br /><a>Name:</a><span> $name</span>";
    echo "<br /><a>Email:</a><span> $email</span>";
    echo "<br /><a>Username:</a><span> $username</span>";
    echo "<br /><a>Date of Birth:</a><span> $birth</span>";
    echo "<br /><a>Gender:</a><span> $gender</span>";
    echo"</div>";
        echo"</div>";

  }
}

else {
  echo "You cannot access this page!!";
}
 ?>

</body>
</html>
