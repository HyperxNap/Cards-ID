<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "school_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$email = $_POST['email'];
$photo = $_FILES['photo']['name'];
$targetDir = "uploads/";
$targetFilePath = $targetDir . $photo;

$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$photo = mysqli_real_escape_string($conn, $photo);


if (!empty($photo)) {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO students (name, email, photo) VALUES ('$name', '$email', '$photo')";
        if ($conn->query($sql) === TRUE) {
            header("Location: students.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Please select a file.";
}

$conn->close();
?>
