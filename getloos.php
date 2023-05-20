<?php
$q = $_GET['q'];

include_once "connection.php";
$sql=$conn->prepare("SELECT * FROM Tbltoilet WHERE ToiletLocation=:loc");
echo($q);
$sql->bindParam(':loc', $q);
$sql->execute();

echo "<table>
<tr>
<th>Location</th>
<th>Description</th>
<th>Image</th>
</tr>
";


while ($row = $sql->fetch(PDO::FETCH_ASSOC))
    {
        echo("<tr><td>".$row["ToiletLocation"].'</td><td> '.$row["Toiletdescription"]."</td><td> <img src=images/".$row["Image"]."></td></tr>");
    }
echo "</table>";

?>