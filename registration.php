<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>

    <h2>Register New User</h2>
    <form method="POST" action="index.php">
        Name: <input type="text" name="username" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>

    <br>
    <a href="index.php">Back to User List</a>

</body>
</html>
