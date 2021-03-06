<?php
require_once '../Model/model.php';

if (isset($_POST['submit'])) {
 $usernameErr = $username =  $email = $emailErr = $course = $courseErr = $salary = $salaryErr = $details = $detailsErr ="";

 $flag=1
;
 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }


  if (empty($_POST["username"])) {
    $usernameErr =  "Name is required";
    $flag=0;
  } else {

       $username = test_input($_POST["username"]);

      if (!preg_match("/^[a-zA-Z-. ]*$/",$username)) {
         $usernameErr =  "Only letters and white space allowed";
         $flag=0;
       }
    else  {
             if(str_word_count($username)<1)
          {
          $usernameErr =  "Name must contains at least two words ";
           $flag=0;

          }
    }
  }

  if (empty($_POST["email"])) {
    $emailErr= "Email is required";
    $flag=0;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr= "Invalid email format";
      $flag=0;
    }
  }


  


    if (empty($_POST["course"])) {
      $courseErr = "Course Name Name is required";
      $flag=0;
    }
    else {
     $course = test_input($_POST["course"]);

     if (!preg_match("/^[a-zA-Z-. ]*$/",$coursename)) {
        $courseErr = "Only letters and white space allowed";
         $flag=0;
       }
       
    }

    if(empty($_POST["details"]))
    {
      $detailsErr = "details is required";
      $flag=0;
    }
    else {
      $details=test_input($_POST["details"]);
      if(strlen($details)<20)
      {
        $detailsErr="details can not be less than eight (20) characters";
        $flag=0;
      }
     
      }
}

if($flag==0){
    $args = array(
    'usernameErr' => $usernameErr,
    'emailErr' => $emailErr,
    'courseErr'=> $courseErr,
    
    'detailsErr' => $detailsErr
);
  
      header("location:../View/giveAd.php?" . 
        http_build_query($args));
   }

if($flag==1)
{  
  $data['username']=$username;
  $data['email']=$email;
  $data['course']=$course;
  
  $data['details']=$details;
 
  if (studentAd($data)) {
    header("location:../View/giveAd.php?");
  }

  else {
    echo 'Could not add!!';
  }
}



else {
  echo "You can not access this page!!";
}







?>