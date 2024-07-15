<?php
session_start();

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in
    if (isset($_SESSION['student_id'])) {
        $studentId = $_SESSION['student_id'];
        
        // Get form data
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $address = htmlspecialchars(strip_tags($_POST['address']));

        // Get profile picture if uploaded
        if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] == 0) {
            $profilePic = $_FILES['profile-pic'];
            $profilePicName = basename($profilePic['name']);
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . $profilePicName;

            // Move uploaded file to the specified directory
            if (move_uploaded_file($profilePic['tmp_name'], $uploadFile)) {
                $profilePicPath = $uploadFile;
            } else {
                echo json_encode(array('success' => false, 'error' => 'Failed to upload profile picture.'));
                exit;
            }
        } else {
            $profilePicPath = null; // No new profile picture uploaded
        }

        // Database connection details
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

        // Prepare SQL update statement
        $sql = "UPDATE students SET name = ?, email = ?, password = ?, address = ?";
        if ($profilePicPath) {
            $sql .= ", profile_pic = ?";
        }
        $sql .= " WHERE student_id = ?";

        $stmt = $conn->prepare($sql);
        if ($profilePicPath) {
            $stmt->bind_param("sssssi", $name, $email, $password, $address, $profilePicPath, $studentId);
        } else {
            $stmt->bind_param("ssssi", $name, $email, $password, $address, $studentId);
        }

        if ($stmt->execute()) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'error' => $conn->error));
        }

        // Close connection
        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(array('success' => false, 'error' => 'User session not found.'));
    }
} else {
    echo json_encode(array('success' => false, 'error' => 'Invalid request method.'));
}
?>
