<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_db";

// Connect database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// Encrypt password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data
$sql = "INSERT INTO users (name, email, phone, password)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);

if ($stmt->execute()) {
    echo "<h2>Registration Successful!</h2>";
    echo "<a href='register.html'>Register Another User</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>