<?php
/* session_start();
	if($_SESSION["Role"]==0){
		header('Location: menu.php');
		//redirects if not admin might consider also similar if not logged in
	} */
?>
<!DOCTYPE html>
<html>
<title>Poopers</title>
    
</head>
<body>
   	<form action="addpooper.php" method="post">
  	Surname:<input type="text" name="surname"><br>
    Forename:<input type="text" name="forename"><br>
  	Password:<input type="password" name ="password"><br>
    <input type="submit" value="Add Pooper">
	</form>
	<h1>Current Poopers:</h1>
<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM Tblpooper");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["Forename"].' '.$row["Surname"]."<br>");
		}
?>   
</body>
</html>