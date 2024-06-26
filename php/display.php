
<html>

    <style> 
    table{
        border:1px red solid;
    }
    tr ,td,th{
        border:1px red solid;
       padding: 5px;
       
    }
</style>
<body>


<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// SQL query to retrieve data from the table
$sql = "SELECT * FROM web_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Message</th>
                <th>Options</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];  // Get the ID value from the database row
        echo "
        <tr>
            <td>" . htmlspecialchars($id) . "</td>
            <td>" . htmlspecialchars($row["name"]) . "</td>
            <td>" . htmlspecialchars($row["address"]) . "</td>
            <td>" . htmlspecialchars($row["email"]) . "</td>
            <td>" . htmlspecialchars($row["message"]) . "</td>
           
            <td><a href='delete.php?id=" . htmlspecialchars($id) . "'>Delete</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

// Close connection
$conn->close();
?>



<br>
    <br>
    <button> <a href="signup.html">ADD New</a></button>

</body>
</html>