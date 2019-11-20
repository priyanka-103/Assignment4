<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Submit</title>
</head>

<body>

<?php
error_reporting(E_ALL ^ E_NOTICE); 
$servername = "localhost";
$username = "root";
$password = "";
$database = "seller";
$link = mysqli_connect($servername, $username, $password, $database);
if(!$link) 
{die("Failed to Setup the Connection: " . mysqli_connect_error());}

$sql1="SELECT name, address, city,phone, email, make,model, year FROM seller_table";

$result = $link->query($sql1);

$sql1="SELECT name, address, city,phone, email, make,model, year FROM seller_table;";

$result = $link->query($sql1);

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. "<br>". "Address: " . $row["address"]. "<br>". "City: " . $row["city"]. "<br>". "Phone Number: " . $row["phone"]. "<br>". "Email Address: " . $row["emai"]. "<br>". "Vehicle Make: " . $row["make"]. "<br>". "Vehicle Model: " . $row["model"]. "<br>". "Year: " . $row["year"];
		echo "</br></br>";
	} 
	
?>
<button><a href="Home.html" class="btn" >Go Home</a></button>
</body>
</html>
