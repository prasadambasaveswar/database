<?php
$servername =  getenv("MYSQL_SERVICE_HOST");
$username = getenv("databaseuser");
$password = getenv("databasepassword");
$dbname = getenv("databasename");



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "INSERT INTO MyTeam (firstname, lastname, email)
VALUES ('".$_get['fname']."', '".$_get['lname']."', '".$_get['email']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql2 = "SELECT * FROM MyTeam;";
$result = $conn->query($sql2);

if ($conn->query($sql2) === TRUE) {
   echo $result;
	} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();
?>

