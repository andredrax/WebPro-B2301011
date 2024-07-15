<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "andre_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration process
if (isset($_POST['register'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phone_number'];

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword) || empty($address) || empty($phoneNumber)) {
        echo "All fields are required.";
    } elseif ($password != $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Generate a unique student ID
        $studentID = 'EDSWA' . rand(100, 999);

        // Prepare an insert statement
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, address, phone_number, student_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $firstName, $lastName, $email, $hashedPassword, $address, $phoneNumber, $studentID);

        if ($stmt->execute()) {
            // Send confirmation email
            try {
                $mail = new PHPMailer(true);

                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'edswanlearninghub@gmail.com';
                $mail->Password = 'voet vvof mbhu hpeo';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                // Recipients
                $mail->setFrom('edswanlearninghub@gmail.com', '@noreply.edswandreslearninghub.com'); // Replace with your desired name
                $mail->addAddress($email, $firstName . ' ' . $lastName);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Registration Successful';
                $mail->Body = "THANK YOU FOR SIGNING UP!! YOUR ONE-TIME STUDENT ID IS $studentID.";

                $mail->send();
                header("Location: firsties.php");
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
$conn->close();
?>