<!DOCTYPE html>
<html>
<title>Toilet addition</title>
    <style>
        img{
            width:50%;
        }
    </style>
</head>
<body>

<form action="addToilet.php" method="POST" enctype="multipart/form-data">
  	Toilet Location:<input type="text" name="ToiletLocation"><br>
  	Description:<p><textarea name="Toiletdescription" rows=5 cols=80 >Enter description here...</textarea></p>
	Rating: <input type="number" id="Rating" name="Rating" min="0" max="10"><br>
    Aroma: <input type="number" id="Aroma" name="Aroma" min="0" max="10"><br>
    Decor: <input type="number" id="Decor" name="Decor" min="0" max="10"><br>
    Privacy: <input type="number" id="Privacy" name="Privacy" min="0" max="10"><br>
    Cleanliness: <input type="number" id="Cleanliness" name="Cleanliness" min="0" max="10"><br>
    Latitude: <input type="number" id="Latitude" name="Latitude" ><br>
    Longditude: <input type="number" id="Longditude" name="Longditude" ><br>
    Image: <input type="file" id="piccy" name="piccy" accept="image/*"><br>
	
  	<input type="submit" value="Add Toilet">
	</form>
</body>
</html>