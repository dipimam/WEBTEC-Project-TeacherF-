<?php
require_once 'db_connect.php';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "teacherf_db");

// Check connection
if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){
// Prepare a select statement
$sql = "SELECT USERNAME, EMAIL, COURSE , SALARY ,DETAILS FROM `tutors_ad` WHERE username LIKE ?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_term);

// Set parameters
$param_term = $_REQUEST["term"] . '%';

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
$result = mysqli_stmt_get_result($stmt);

// Check number of rows in the result set
if(mysqli_num_rows($result) > 0){
// Fetch result rows as an associative array
echo "<br><table>";
echo "<tr>";



echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Course</th>";
echo "<th>Salary</th>";
echo "<th>Details</th>";

echo "</tr>";



while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){


// echo "<tr>";
// // echo "<th>CustomerID</th>";
// // echo "<td>" . $id . "</td>";
// echo "<th>Client Name:- </th> <br>";
// echo "<td>" . $row["USERNAME"]. "</td>";
// echo "<th>Email:-</th>";
// echo "<td>" . $row["EMAIL"] . "</td>";
// echo "<th>Course:-</th>";
// echo "<td>" . $row["COURSE"] . "</td>";
// echo "<th>Salary:- </th>";
// echo "<td>" . $row["SALARY"] . "</td>";
// echo "<th>Details:- </th>";
// echo "<td>" . $row["DETAILS"] . "</td>";
 
// echo "</tr>";
// echo "</table>";


echo "<tr>";



echo "<td>" . $row["USERNAME"] . "</td>";
echo "<td>" . $row["EMAIL"] . "</td>";
echo "<td>" . $row["COURSE"] . "</td>";
echo "<td>" . $row["SALARY"] . "</td>";
echo "<td>" . $row["DETAILS"] . "</td>";




echo "</tr>";






}
echo "</table>";
} else{
echo "<p>No matches found</p>";
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

// Close statement
mysqli_stmt_close($stmt);
}

// close connection
mysqli_close($link);
?>