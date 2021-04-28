<?php 

require_once 'db_connect.php';




function showAllusers(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `user_info` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showuser($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `user_info` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchproduct($product_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` WHERE Name LIKE '%$product_name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function adduser($data){
	$conn = db_conn();
    $selectQuery = "INSERT into user_info ( Name, Address, PhoneNumber, Birthday, Gender, Designation, Password)
VALUES (:name, :address, :phonenum, :dob, :gender, :designation, :pass)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':address' => $data['address'],
        	':phonenum' => $data['phonenum'],
            ':dob' => $data['dob'],
            ':gender' => $data['gender'],
            ':designation' => $data['designation'],
            ':pass' => $data['pass']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function RegistrationForm($data){
    $conn = db_conn();
    $selectQuery = "INSERT into user_info ( Name, Email, Birthday, Gender, Username, Password, Confirmpass)
    VALUES(:name, :email, :birthday, :gender, :username, :Password, :confirmpass)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':birthday' => $data['birthday'],
            ':gender' => $data['gender'],
            ':username' => $data['username'],
            ':Password' => $data['Password'],
            ':confirmpass' => $data['confirmpass']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;

} 




function updateproduct($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Name = ?, BuyingPrice = ?, SellingPrice = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['buyingprice'], $data['sellingprice'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteproduct($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `user_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
	
	

    return true;
}
function deletereciptionist($id){
$conn = db_conn();
$selectQuery = "DELETE FROM `user_info` WHERE `ID` = ?";
try{
$stmt = $conn->prepare($selectQuery);
$stmt->execute([$id]);
}catch(PDOException $e){
echo $e->getMessage();
}
$conn = null;

 return true;
}