<?php
$servername =  getenv("MYSQL_SERVICE_HOST");
$username = getenv("databaseuser");
$password = getenv("databasepassword");
$dbname = getenv("databasename");

echo getenv("MYSQL_SERVICE_HOST");
echo getenv("databaseuser");
echo getenv("databasepassword");
echo getenv("databasename");



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "INSERT INTO MyTeam (firstname, lastname, email) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]')";

echo "===================";
echo $_POST["fname"];
echo $_POST["lname"];
echo $_POST["email"];

echo "===================";


//"INSERT INTO nametable (fname, lname)

//VALUES

//('$_POST[fname]','$_POST[lname]')";



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

	//$sql2 = "SELECT * FROM MyTeam;";
//	echo $conn->query($sql2);
/*	$db = new database();
	$query = "select * from data";
        $result = $db->select($query);

        echo "<table>";
         echo "<tr>";
            echo "<th>Name </th>";
            echo "<th>L-Name </th>";
	echo "<th>Mail </th>";
         echo "</tr>";
         while($row = mysqli_fetch_array($result)) 
         {
            echo "<tr>";
            echo "<td> $row[firstname]</td>";
            echo "<td> $row[lastname]</td>";
		 echo "<td> $row[email]</td>";
            echo "</tr>";
         }
       echo "</table>";
    */
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




/*$sql2 = "SELECT * FROM MyTeam;";
$result = $conn->query($sql2);
Welcome <?php echo $_GET["name"]; ?><br>
if ($conn->query($sql2) === TRUE) {
   echo $result;
	} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
*/
$conn->close();
?>

