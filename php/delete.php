<?php

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

//to delete using id which is always unique so...
$id = $_GET["id"];
$sql = "DELETE FROM web_table WHERE id =" .$id;


if($conn->query($sql) === TRUE){
    echo "Delete successful";
}else{
    echo "ERROR::" . $conn->error;
}


// // Drop the entire table
// $sql = "DROP TABLE web_table";

// if ($conn->query($sql) === TRUE) {
//     echo "Table 'web_table' deleted successfully";
// } else {
//     echo "Error deleting table: " . $conn->error;
// }
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