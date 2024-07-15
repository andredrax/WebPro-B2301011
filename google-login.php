<?php
require_once 'vendor/autoload.php';

// Start session
session_start();

// Set up the Google Client
$client = new Google_Client();
$client->setClientId('YOUR_GOOGLE_CLIENT_ID');
$client->setClientSecret('YOUR_GOOGLE_CLIENT_SECRET');
$client->setRedirectUri('http://yourwebsite.com/google-callback.php');
$client->addScope("email");
$client->addScope("profile");

// Get the Google OAuth URL
$login_url = $client->createAuthUrl();

// Redirect to Google OAuth URL
header('Location: ' . $login_url);
exit();
?>
