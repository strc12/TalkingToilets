<?php
session_start();
print_r($_SESSION);
//header('Location: tuck.php');
print_r($_POST);
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
	//create order if not already created
    $x=1;

	
	$stmt = $conn->prepare("INSERT INTO TblToilet(ToiletID,ToiletLocation,Toiletdescription, Rating, Aroma,Decor, Privacy, Cleanliness, Latit, Longdit,Image,Checkins, Likes)
    VALUES (NULL,:Tloc,:Tdesc,:Rating,:Aroma,:Decor,:Privacy,:Cleanliness, :Latit,:Longdit,:Pic,NULL,NULL)");
    $stmt->bindParam(':Tloc', $_POST["ToiletLocation"]);
    $stmt->bindParam(':Tdesc', $_POST["Toiletdescription"]);
    $stmt->bindParam(':Rating', $_POST["Rating"]);
    $stmt->bindParam(':Aroma', $_POST["Aroma"]);
    $stmt->bindParam(':Decor', $_POST["Decor"]);
    $stmt->bindParam(':Privacy', $_POST["Privacy"]);
    $stmt->bindParam(':Cleanliness', $_POST["Cleanliness"]);
	$stmt->bindParam(':Latit', $_POST["Latitude"]);
    $stmt->bindParam(':Longdit', $_POST["Longditude"]);
    $stmt->bindParam(':Pic', $_FILES["piccy"]["name"]);
    
    $stmt->execute();
    $target_dir = "images/";
    print_r($_FILES);
    $target_file = $target_dir . basename($_FILES["piccy"]["name"]);
    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["piccy"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["piccy"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null; 
?>