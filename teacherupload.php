<?php
session_start();
// Check if admin is logged in
if (!isset($_SESSION['teacher_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "andre_project";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['file']) && isset($_POST['upload_type'])) {
    $upload_type = $_POST['upload_type'];
    $teacher_id = $_SESSION['teacher_id'];

    // Handle video upload
    if ($upload_type == 'video') {
        $target_dir = "uploads/videos/";
    } elseif ($upload_type == 'document') {
        $target_dir = "uploads/documents/";
    } else {
        die("Invalid upload type");
    }

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "mp4" && $fileType != "pdf" && $fileType != "docx" && $fileType != "pptx") {
        echo "Sorry, only MP4, PDF, DOCX, PPTX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Insert uploaded file details into database
            $file_name = basename($_FILES["file"]["name"]);
            $file_path = $target_file;
            $upload_date = date("Y-m-d H:i:s");

            $stmt = $conn->prepare("INSERT INTO uploads (teacher_id, file_name, file_path, upload_date, type) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $teacher_id, $file_name, $file_path, $upload_date, $upload_type);
            $stmt->execute();
            $stmt->close();

            echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
