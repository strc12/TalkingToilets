<!DOCTYPE html>
<html>
<title>Visit/rate Toilet</title>

<script>
function showLoos(str) {
  if (str=="") {
    document.getElementById("result").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("result").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getloos.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
    <h1>Search by location</h1>
    <form>
    <select name="location" onchange="showLoos(this.value)">
	<?php
    include_once('connection.php');
	$stmt = $conn->prepare("SELECT DISTINCT ToiletLocation FROM TblToilet");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo("<option value='".$row["ToiletLocation"]."'>".$row["ToiletLocation"]."</option>");
		}
    
?>  
</select>
</form> 
<div id="result">gf</div>
</body>
</html>