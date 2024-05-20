<?php
include 'connect.php'; //for reading the data of the database
if (isset($_POST['submit'])) { //if we click on submit button then this if will execute
    //no need for id as it is autoincremented in the database
    $name = $_POST['name'];
    $email = $_POST['email'];  // ' ' inside this we used name ='email' line 49
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "insert into `crud` (name,email,mobile,password) 
    values ('$name','$email','$mobile','$password') ";

    $result = mysqli_query($con, $sql); //this method is for executing this sql query
    if ($result) {
        echo '<script>alert("User Registration Successfull");
        window.location.href = "index.html";</script>';
    } else {
        die(mysqli_error($con));
    }
}
?>