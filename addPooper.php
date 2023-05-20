<?php
session_start();
print_r($_SESSION);
header('Location: pooper.php');
print_r($_POST);
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
	
    
	$Username=substr($_POST["forename"],0,1).".".$_POST["surname"];//format initial.surname
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt4 = $conn->prepare("INSERT INTO TblPooper(UserID,Username,Surname,Forename,Password)VALUES (NULL,:un,:sn,:fn,:hp)");
    $stmt4->bindParam(':hp', $hashed_password);
    $stmt4->bindParam(':fn', $_POST["forename"]);
    $stmt4->bindParam(':sn', $_POST["surname"]);
    $stmt4->bindParam(':un', $Username);
    $stmt4->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null; 
?>