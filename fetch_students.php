<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "school_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

$students = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        $photoPath = "uploads/" . $row["photo"];
        
        $students[] = array(
            "name" => $row["name"],
            "email" => $row["email"],
            "photo" => $photoPath 
        );
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($students);
?>
