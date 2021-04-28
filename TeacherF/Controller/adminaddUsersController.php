<?php  
require_once '../model/model.php';


if (isset($_POST['create']))  {  


$flag=1;
$nameErr = $addressErr = $dobErr = $PnumberErr = $genderErr = $designationErr = "";
$usernameErr = $passwordErr = "";
$name = $address = $gender = $Pnumber = $dob = $designation = "" ;
$username = $password = "";

 

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
   $nameErr="Name is required";
    $flag=0;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$name)) {
      $nameErr= "Only letters white space, period & dash allowed<br>";
      $name ="";
      $flag=0;
    }
    else if (str_word_count($name)<2) {
      $nameErr= "At least two words needed<br>";
      $name ="";
      $flag=0;
    }
  }
 

 

  if (empty($_POST["phonenum"])) {
    $PnumberErr = "Phone number is required<br>";
    $flag=0;
  }else {
    $Pnumber = test_input($_POST["phonenum"]);
   if (strlen($Pnumber)>11 || strlen($Pnumber)<11) {
      $PnumberErr = "Enter Only 11 digit Phone number<br>";
      $Pnumber ="";
      $flag=0;
    }
   if (empty($_POST["address"])) {
    $addressErr = "Present Address is required<br>";
    $flag=0;
  } else {
    $address = test_input($_POST["address"]);
  } 

 
 if (empty($_POST["designation"])) {
    $designationErr ="Select designation<br>";
    $flag=0;
  } else {
    $designation = test_input($_POST["designation"]);
  }
  
  
  if (empty($_POST["dob"])) {
    $dobErr ="required dob<br>";
    $flag=0;
  } else {
    $dob = test_input($_POST["dob"]);
  }
  
 

  if (empty($_POST["gender"])) {
    $genderErr = "Select gender<br>";
    $flag=0;
  } else {
    $gender = test_input($_POST["gender"]);
  }
  }
  }
  if($flag==0){
    $args = array(
    'nameErr' => $nameErr,
    'addressErr' =>$addressErr,
	'PnumberErr' => $PnumberErr,
    'dobErr' => $dobErr,
	'genderErr' => $genderErr,
	'designationErr' => $designationErr,
    'passErr' => $passErr
    
   
);
      header("location:../addStudent.php?" . http_build_query($args));
	  
   }
 if($flag==1){
	$data['name'] = $_POST['name'];
	$data['address'] = $_POST['address'];
	$data['phonenum'] = $_POST['phonenum'];
	$data['dob'] = $_POST['dob'];
	$data['gender'] = $_POST['gender'];
  $data['designation'] = $_POST['designation'];
    $data['pass'] = $_POST['pass'];

  if (adduser($data)) {
  	echo 'Successfully added!!';
  }
 
} }else {
	echo 'You are not allowed to access this page.';
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
?>