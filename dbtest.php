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

$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
$sql = "INSERT INTO MyTeam (firstname, lastname, email) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	$result = mysqli_query($conn,"SELECT firstname, lastname, email FROM MyTeam;");
	echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['lastname'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "</tr>";
}
echo "</table>";

	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>

