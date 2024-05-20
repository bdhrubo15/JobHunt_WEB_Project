<?php
include 'connect.php'; // Including database connection

// Check if marks data is received from the form submission
if (isset($_POST['marks'])) {
    // Sanitize the received data
    $marks = mysqli_real_escape_string($con, $_POST['marks']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Insert marks into the database
    $insertSql = "INSERT INTO quizMarks (email, marks) VALUES ('$email', '$marks')";
    if (mysqli_query($con, $insertSql)) {
        // Check if marks is greater than or equal to 3
        if ($marks >= 3) {
            // Redirect to popup.html
            echo '<script>alert("Your application is successful!"); window.location.href = "popup.html";</script>';
        } else {
            // Redirect to failed.html
            echo '<script>alert("You are not eligible to apply!"); window.location.href = "failed.html";</script>';
        }
    } else {
        echo "Error inserting marks: " . mysqli_error($con);
    }
} else {
    echo "Marks data not received";
}
?>
