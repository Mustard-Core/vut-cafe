<?php
include 'connection.php';


$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];


// Insert into database
$sql = "INSERT INTO user (email, first_name, last_name, phone, pass) VALUES (?, ?, ?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss",$email, $first_name, $last_name,$phone,$pass);

if ($stmt->execute()) {
    echo "Data saved succsessfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>