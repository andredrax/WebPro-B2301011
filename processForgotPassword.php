<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "andre_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require 'sendEmail.php';  // Include the PHPMailer configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if ($email) {
        $stmt = $conn->prepare("SELECT student_id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $studentID = $row['student_id'];

            // Generate a unique token
            $token = bin2hex(random_bytes(50));

            // Store the token in the database with an expiry time
            $stmt = $conn->prepare("INSERT INTO password_resets (student_id, token, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
            $stmt->bind_param("ss", $studentID, $token);
            $stmt->execute();

            // Construct the reset link
            $resetLink = "http://localhost/myxampp2024/processResetPassword.php?token=" . $token; // Update with your domain and path

            // Send the reset link via email
            sendPasswordResetEmail($email, $resetLink);

            echo "<p>A password reset link has been sent to your email.</p>";
        } else {
            echo "<p>No account found with that email address.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Please provide a valid email address.</p>";
    }
}

$conn->close();
?>
