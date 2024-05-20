<?php
include 'connect.php';

$message = $_POST['message'];
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];

$sql = "INSERT INTO contact VALUES ('','$message', '$name', '$email', '$subject')";
$result = mysqli_query($con, $sql);

if ($result) {
    echo '<script>alert("Your message has been sent to the team.");
     window.location.href = "contact.html";</script>';
    } 
else {
    die(mysqli_error($con));
}
?>



