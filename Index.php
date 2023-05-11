<!DOCTYPE html>
<html>
<title>Toilets</title>
    <style>
        img{
            width:50%;
        }
    </style>
</head>
<body>

	<?php
    include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblToilet");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["Toiletdescription"].' '.$row["ToiletLocation"].' '.$row["Rating"]."<br>");
            echo ('<img src="images/'.$row["Image"].'"><br>');
		}
?>   
</body>
</html>