<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="../css/formStyle.css">
<script src="../JS/jsvalidation.js" type="text/javascript"></script>
<script src="../JS/jquery.js" type="text/javascript"></script>
<script >
  // function showHint(str) {
// if (str.length == 0) {
// document.getElementById("txtHint").innerHTML = "";
// return;
// } else {
// var xmlhttp = new XMLHttpRequest();
// xmlhttp.onreadystatechange = function() {
// if (this.readyState == 4 && this.status == 200) {
// document.getElementById("txtHint").innerHTML = this.responseText;
// }
// };
// xmlhttp.open("GET", "namesuggestion.php?q=" + str, true);
// xmlhttp.send();
// }
// }
    $(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;    
    $('#birth').attr('max', maxDate);
});

    $(document).ready(function(){

        $('#username').keyup(function(){
            var username = $(this).val();
                $.ajax({
                url: "../Model/Check.php",
                method:"POST",
                data:{uname:username},
                dataType:"text",
                success:function(html)
                {
                 
                    $('#availability').html(html);

                }
            });
        });
    });
    

$(document).ready(function(){
    $('#search').on('click', 'ul.list-unstyled li', function(){
          var y = $(this).text();
          $('#username').val(y);
    });
$('#username').keyup(function(){
      var datas = $('#username').val();
            $.ajax({
                method: 'GET',
                url: "../Model/searchName.php",
                data: {datas:datas},
                dataType: 'text',
                success: function (res) {
                   $('#search').html(res);
                    $("#search").fadeToggle();

                }

            })
            
          });

        });

</script>
<style>
.error {color: #FF0000;}
   body{
      background-image: url('../Sources/login.webp');
      background-repeat: no-repeat;
      background-size: 1700px 900px;
    }
.form{
  margin-top: 60px;
  max-width: 800px;
}
</style>
</head>
<body>



<div><?php include("headerView.php"); ?></div>


<div class="form">
<form method="post" action="../Controller/signupTeacherController.php" autocomplete="off">
<h2>Registration</h2><hr><br>
  <a>Name:</a> <input type="text" name="name" id="name" onkeyup="showHint(this.value)" onkeyup="checkName()" onblur="checkName()" >

  <span id="txtHint"></span>
  <span  class="error" id="nameErr"><?php if (!empty($_GET['nameErr'])) {echo $_GET['nameErr'];} ?> </span>
  
  <br><br>

   <a>E-mail:</a> <input type="text" name="email" id="email" onkeyup="checkEmail()" onblur="checkEmail()">
   <span  class="error" id="emailErr"><?php if (!empty($_GET['emailErr'])) {echo $_GET['emailErr'];} ?> </span>
  <br><br>

  <a>User Name: </a><input type="text" name="username" id="username" onkeyup="checkUsername()" onblur="checkUsername()" >

  <span  class="error" id="usernameErr"><?php if (!empty($_GET['usernameErr'])) {echo $_GET['usernameErr'];} ?> </span>
  <div id="search"></div>
  <span class="error" id="availability"></span>
  <br><br>

  <a>Password:</a> <input type="password" name="password" id="password" onkeyup="checkPass()" onblur="checkPass()" >
  <span  class="error" id="passwordErr"><?php if (!empty($_GET['passwordErr'])) {echo $_GET['passwordErr'];} ?> </span>
  <br><br>

  <a>Comfirm Password:</a> <input type="password" name="confirmpassword" id="confirmpassword" onkeyup="confirmPass()" onblur="confirmPass()">
  <span  class="error" id="confirmpasswordErr"><?php if (!empty($_GET['confirmpasswordErr'])) {echo $_GET['confirmpasswordErr'];} ?> </span>
  <br><br>


 <a>Date of Birth:</a> <input type="date" size="1" name="birth" id="birth" max="2017-05-20" onkeyup="checkDOB()" onblur="checkDOB()" >
<span  class="error" id="birthErr"><?php if (!empty($_GET['birthErr'])) {echo $_GET['birthErr'];} ?> </span>

  <br><br>
 <a> Gender:</a>
  <input type="radio" name="gender"  value="female"><span style="color: white;">Female</span>
  <input type="radio" name="gender"  value="male"><span style="color: white;">Male</span>
  <input type="radio" name="gender"  value="other"><span style="color: white;">Other</span>
  <span style="color: red;" class="error"><?php if (!empty($_GET['genderErr'])) {echo $_GET['genderErr'];} ?> </span>
  <br><br>


  <input type="submit" name="submit" value="Submit">
</form>

</div>

</body>
</html>
