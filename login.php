<?php
include 'connection.php';


$email = $_POST['email'];
$pass = $_POST['pass'];



// Insert into database

$sql = "SELECT * FROM user WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $$email);
$stmt->execute();
$result = $stmt->get_result();



if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verify the password (assuming it's hashed)
    if (password_verify($pass, $row['pass'])) {
        // Login success
        session_start();
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}






?>