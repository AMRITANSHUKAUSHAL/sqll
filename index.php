<?php
// Database connection here - centralized
$con = mysqli_connect("localhost", "root", "", "wipro_db");
if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Handle form submission if coming from registration.php form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Insert data into students table
    $sql = "INSERT INTO students (username, email, password) VALUES ('$name', '$email', '$pass')";
    if (mysqli_query($con, $sql)) {
        $message = "User registered successfully.";
    } else {
        $message = "Error: " . mysqli_error($con);
    }
}

// Fetch all users for display
$resp = mysqli_query($con, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List & Registration</title>
</head>
<body>
    <h2>User List</h2>

    <?php
    if (!empty($message)) {
        echo "<p><strong>$message</strong></p>";
    }

    if ($resp && mysqli_num_rows($resp) > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>UID</th><th>Username</th><th>Email</th><th>Password</th></tr>";

        while ($row = mysqli_fetch_assoc($resp)) {
            echo "<tr>";
            echo "<td>" . $row['uid'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No users found.";
    }

    mysqli_close($con);
    ?>

    <hr>

    <h2>Register New User</h2>
    <form method="POST" action="">
        Name: <input type="text" name="username" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>

</body>
</html>
