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

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<img src="' . $row["photo"] . '" alt="' . $row["name"] . '">';
        echo '<p>Name: ' . $row["name"] . '</p>';
        echo '<p>Email: ' . $row["email"] . '</p>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>
