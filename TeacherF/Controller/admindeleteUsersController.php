<?php

require_once '../model/model.php';

if (deletereciptionist($_GET['id'])) {
header('Location: ../showallusers.php');
}

 ?>