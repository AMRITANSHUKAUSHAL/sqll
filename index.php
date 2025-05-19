<?php
// Perform database connection
$con = mysqli_connect("localhost", "root", "", "wipro_db");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Database connected successfully<br>";

// Execute query
$resp = mysqli_query($con, "SELECT * FROM users");

// Check and display data
if ($resp && mysqli_num_rows($resp) > 0) {
    echo '<h2>User List</h2>';
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
    echo "<br>No users found.";
}

// Close connection
mysqli_close($con);
?>
