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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = filter_input(INPUT_POST, 'new-password', FILTER_SANITIZE_STRING);
    $confirmPassword = filter_input(INPUT_POST, 'confirm-password', FILTER_SANITIZE_STRING);
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

    if ($newPassword && $confirmPassword && $token) {
        if ($newPassword === $confirmPassword) {
            // Check if the token is valid and not expired
            $stmt = $conn->prepare("SELECT student_id FROM password_resets WHERE token = ? AND expires_at > NOW()");
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $studentID = $row['student_id'];

                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the user's password in the database
                $stmt = $conn->prepare("UPDATE users SET password = ? WHERE student_id = ?");
                $stmt->bind_param("ss", $hashedPassword, $studentID);
                $stmt->execute();

                // Delete the token to prevent reuse
                $stmt = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
                $stmt->bind_param("s", $token);
                $stmt->execute();

                echo "<p>Your password has been reset successfully.</p>";
            } else {
                echo "<p>Invalid or expired token.</p>";
            }
        } else {
            echo "<p>Passwords do not match.</p>";
        }
    } else {
        echo "<p>Please fill in all fields.</p>";
    }
}

$conn->close();
?>
