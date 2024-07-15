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
    $studentID = filter_input(INPUT_POST, 'studentID', FILTER_SANITIZE_STRING);
    $inputPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if ($studentID && $inputPassword) {
        $stmt = $conn->prepare("SELECT student_id, first_name, password FROM users WHERE student_id = ?");
        $stmt->bind_param("s", $studentID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (password_verify($inputPassword, $row['password'])) {
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['first_name'] = $row['first_name'];
                header("Location: firsties.php");
                exit();
            } else {
                echo "<p>Invalid password.</p>";
            }
        } else {
            echo "<p>No account found with that student ID.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Please provide valid inputs.</p>";
    }
}

$conn->close();
?>
