<?php include_once("inc_header.php");?>
<?php include_once("inc_header.php");?>

<h1>My INdex Page</h1>
<!-- Creating the User login form-->
<?php
//Getting the forms data
    //checking the form is submitted or not
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $uname=$_POST["username"];
        $upass=$_POST["password"];
        echo "Hi " .$uname. "Welcome to the site . Your password is ". md5($upass);
        echo "<br> May be you don't understand the above password. Its encrypted from";
        echo "<br> Your password is ".$upass;
        }
?>
<form method="POST" name="login" action="" enctype="multipart/form-data">
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="submit" name="submit" value="Login"><br>
</form>
<?php include("inc_footer.php");?>