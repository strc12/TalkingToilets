<?php 
    // note this does not use connection.php as connection made at the time of creation
   $servername = 'localhost';
   $username = 'root';
   $password= '';
//note no Database mentioned here!!

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS Toilets";
    $conn->exec($sql);
    //next 3 lines optional only needed really if you want to go on an do more SQL here!
    $sql = "USE Toilets";
    $conn->exec($sql);
    echo "DB created successfully";
    $stmt1 = $conn->prepare("DROP TABLE IF EXISTS TblUser;
    CREATE TABLE TblUser 
    (UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(20) NOT NULL,
    Surname VARCHAR(20) NOT NULL,
    Forename VARCHAR(20) NOT NULL,
    Password VARCHAR(200) NOT NULL)");
    $stmt1->execute();
    $stmt1->closeCursor(); 

    $stmt2 = $conn->prepare("DROP TABLE IF EXISTS TblToilet;
    CREATE TABLE TblToilet
    (ToiletID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ToiletLocation  VARCHAR(40) NOT NULL,
    Toiletdescription LONGTEXT NOT NULL,
    Rating INT(1) NOT NULL,
    Aroma INT(1) NOT NULL,
    Decor INT(1) NOT NULL,
    Privacy INT(1) NOT NULL,
    Cleanliness INT(1) NOT NULL,
    Latit DECIMAL(10,6),
    Longdit DECIMAL(10,6),
    Image VARCHAR(255) NOT NULL,
    Checkins INT(4) DEFAULT 0,
    Likes INT(4) DEFAULT 0)");
    $stmt2->execute();
    $stmt2->closeCursor();
    //note datetime allows time as well as date to be stored compared with just date
    $stmt3 = $conn->prepare("DROP TABLE IF EXISTS TblVisits;
    CREATE TABLE TblVisits
    (ToiletID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UserID INT(4),
    DateofoVisit DATETIME)");
    $stmt3->execute();
    $stmt3->closeCursor(); 

    
    $hashed_password = password_hash("password", PASSWORD_DEFAULT);
    $stmt4 = $conn->prepare("INSERT INTO TblUser(UserID,Username,Surname,Forename,Password)VALUES 
    (NULL,'cunniffe.r','Cunniffe','Robert',:hp),
    (NULL,'james.h','James','Hector',:hp),
    (NULL,'smith.j','Smith','John',:hp),
    (NULL,'jones.d','Jones','Davy',:hp),
    (NULL,'patel.n','Patel','Nish',:hp)
    ");
    $stmt4->bindParam(':hp', $hashed_password);

    $stmt4->execute();
    /*
    $stmt4->closeCursor();
    $stmt5 = $conn->prepare("INSERT INTO TblTuck(TuckID,Tuckname,Tuckdescription,Quantity,Price)VALUES 
    (NULL,'Mars Bar','Sugary bar',100,0.60),
    (NULL,'Pringles','pringles minipack',30,1.20),
    (NULL,'Coke','Fizzy Pop',20,1.00)
    ");
    $stmt5->execute();
    $stmt5->closeCursor(); */
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=Null;
?>