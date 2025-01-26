<?php 
session_start();
include_once("inc_header.php");?>
<?php include_once("inc_header.php");?>

<h1><?php if(isset($_SESSION['college'])) echo $_SESSION['college'];?></h1>
<!-- Creating the User login form-->
<?php
//Getting the forms data
    //checking the form is submitted or not
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $uname=$_POST["username"];
        $upass=$_POST["password"];
       
        //checking the remember box is checked or not
        if(isset($_POST['remember'])){
            setcookie("username", $uname, time()+60*60*24*7,"/");
            setcookie("password", $upass, time()+60*60*24*7,"/");
        }

        if($uname=="admin" and $upass=="admin123"){
            //creating the session
            $_SESSION['username']=$uname;
            $_SESSION['atime']=date("Ymdhisa");
            //redirecting the user to dashboard.php
            header("Location: dashboard.php");
        echo "Hi " .$uname. "Welcome to the site . Your password is ". md5($upass);
        echo "<br> May be you don't understand the above password. Its encrypted from";
        echo "<br> Your password is ".$upass;
        }
        }
?>
<form method="POST" name="login" action="" enctype="multipart/form-data">
    <input type="text" name="username" placeholder="Username" value=<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>><br>
    <input type="password" name="password" placeholder="Password" value=<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>><br>
    <input type="checkbox" name="remember" value="remember">Remeber Me<br>
    <input type="submit" name="submit" value="Login"><br>
</form>
<?php include("inc_footer.php");?>