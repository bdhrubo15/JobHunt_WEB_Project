<?php
include 'connect.php'; // Including database connection

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `crud` WHERE `email`='$email'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password) {
                // Login successful
                echo "";
               

                
                if (mysqli_query($con, $sql)) {
                    echo '<script>alert("Login Successful");
                    window.location.href = "application.html";</script>';
                } else {
                    echo "Error inserting email into quizMarks: " . mysqli_error($con);
                }
            } else {
                echo "Invalid email or password";
            }
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
