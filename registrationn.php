<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = mysqli_connect("localhost", "root", "", "wipro") or die("Connection failed");

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO students (name, email, password) VALUES ('$username', '$email', '$password')";
    
    if (mysqli_query($con, $query)) {
        echo "Registered successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
