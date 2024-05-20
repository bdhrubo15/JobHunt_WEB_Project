<?php
session_start(); // Start the session

// Debugging: Print session variables to check if they are set correctly
echo "Session variables: ";
print_r($_SESSION);

// Check if the user is logged in
if (isset($_POST['loggedIn']) && $_POST['loggedIn'] == '1' && isset($_SESSION['user_id'])) {
    // Process job application
    // Add your application logic here

    echo "Application submitted successfully!";
    // Redirect to applications.html
    header("Location: application.html");
    exit();
} else {
    // User is not logged in, redirect to login page or return a message
    header("Location: login.html");
    exit();
}
?>
