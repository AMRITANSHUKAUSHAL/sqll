<?php
// Connect to database
$con = mysqli_connect("localhost", "root", "", "wipro_db");

if (!$con) {
    die("Connection Failed");
}

// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Insert into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$pass')";
    if (mysqli_query($con, $sql)) {
        echo "User registered successfully. <a href='index.php'>View Users</a>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="POST" action="">
        Name: <input type="text" name="username" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
