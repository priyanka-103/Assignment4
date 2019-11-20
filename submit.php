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


$name = mysqli_real_escape_string($link, $_REQUEST["name"]);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$make = mysqli_real_escape_string($link, $_REQUEST['make']);
$model = mysqli_real_escape_string($link, $_REQUEST['model']);
$year = mysqli_real_escape_string($link, $_REQUEST['year']);
$url = "https://jdpower.com/Cars/$make/$model/$year";
$sql = "INSERT INTO seller_table (name, address, city,phone, email, make,model, year) VALUES ('$name', '$address', '$city','$phone', '$email', '$make','$model', '$year');";

if(mysqli_query($link, $sql)){
	$last_id=$link->insert_id;
	//echo $last_id;
   // echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql1="SELECT name, address, city,phone, email, make,model, year FROM seller_table where Seller_id=$last_id;";

$result = $link->query($sql1);

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. "<br>". "Address: " . $row["address"]. "<br>". "City: " . $row["city"]. "<br>". "Phone Number: " . $row["phone"]. "<br>". "Email Address: " . $row["emai"]. "<br>". "Vehicle Make: " . $row["make"]. "<br>". "Vehicle Model: " . $row["model"]. "<br>". "Year: " . $row["year"];
		
	} 
	?>
	<p><a id="url" href="<?php echo $url; ?>"><?php echo $url; ?></a>
	<?php
// Attempt insert query execution

 
// Close connection
mysqli_close($link);
?>
</br>
</br>
<button><a href="Home.html" class="btn" >Go Home</a></button>

</body>
</html>