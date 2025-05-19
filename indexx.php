<?php
// perform database connect
$con=mysqli_connect("localhost","root","","wipro_db") or die;
 echo"Database connected successfully";


 $resp = mysqli_query($con,'SELECT * FROM users');

if($resp && mysqli_num_rows($resp)>0){
    echo '<h2>User List</h1>';
    echo "<table border='1'>";
    echo "<tr><th>UID</th><th>Username</th><th>Email</th><th>Password</th></tr>";
    while($row=mysqli_fetch_assoc($resp)){
        echo "<tr>";
        echo '<td>'.$row['uid'].'</td><td>'.$row['username'].'</td><td>'.$row['email'].'</td><td>'.$row['password'].'</td>';
        echo "</tr>";
    }
    echo "</table>";
}else{
    echo "<br>No users found";
}

mysqli_close($con);
?>
