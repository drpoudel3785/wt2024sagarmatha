<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>

<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    //collecting data from the form
    $username=$_POST['uname'];
    $pwd=md5($_POST['upass']);
    $email=$_POST['uemail'];
    $sql = "INSERT INTO users(username, password, email)VALUES('$username','$pwd','$email')";

    //making db connection
    include("connection.php");
    //executing the sql statement
    $qry=mysqli_query($conn, $sql) or die(mysqli_error());
    if($qry){
        echo "$username Registered Successfully";
    }
}
?>
    <form method="POST" name="register" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>User Registration</legend>
            <input type="text" name="uname" placeholder=
            "username"><bR>
            <input type="password" name="upass" placeholder="Password">
            <br>
            <input type="email" name="uemail" placeholder="you@domain.com"><bR>
            <input type="submit" name="submit" value="Register">
</form>

<h2>Shwowing All the Datas form the table users</h2>
<table border=0 cellpadding=5 cellspacing=5>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $sql ="SELECT * FROM users order by id ASC LIMIT 0,100";
        include("connection.php");
        $qry=mysqli_query($conn, $sql) or die(mysqli_error());
        $noofrecord=mysqli_num_rows($qry);
        if($noofrecord>=1){
            echo $noofrecord. " Users Found";
        }
        else{
            echo "Sorry no Users Registered Yet!";
        }
        while($row=mysqli_fetch_array($qry))
        {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['role']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
    
</body>
</html>