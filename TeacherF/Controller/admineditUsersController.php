<?php 

require_once '../model/model.php';
$tableName = 'user_info';
if(isset($_POST['submit'])) {
	$data['Name'] = $_POST['name'];
	$data['Address'] = $_POST['address'];
	$data['Designation'] = $_POST['designation'];
	$data['Password'] = $_POST['password'];
	if(empty($_POST['display'])){
		$data['display'] = "No";
	}
	else{
		$data['display'] = $_POST['display'];
	}

  if (updateProduct($tableName, $_GET['id'], $data)) {
  	header('Location: ../showallusers.php');
  }
} 
else {
	echo '<p>You are not allowed to access this page</p>';
}

 ?>