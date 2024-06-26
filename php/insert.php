<?php
// Database connection details

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "web_db";

// Create a connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Insert data into the database table
if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
    // Get form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    
$sql = "INSERT INTO web_table (name, address, email, message) VALUES ('$name',  '$address', '$email', '$message')";
}

if ($conn->query($sql) === TRUE) {//if connection established with sql
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
    // Close connection
    $conn->close();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <br>
    <button><a href="display.php"> Display all </a> </button>
    <br>
    <br>
    <button> <a href="signup.html">ADD New</a></button>
</body>
</html>