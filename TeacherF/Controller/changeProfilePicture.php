

<?php
require_once "../model/model.php";

session_start();


if(isset($_POST['submit']) && isset($_SESSION['username']))
{


       $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
       if(uploadProfilePictureTutor($_SESSION['username'],$file))
       {
        header("location:../view/viewprofile.php");
       }
       else {
         echo "Could not update";
       }

}

else {
  echo "You are not allowed to access this page";
}




?>
