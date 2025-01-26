<?php
session_start();

$_SESSION['college']="Sagarmatha Engineering and IT COllege";

$name="ram123";
$password="ram123";

setcookie("uname",$name, time()+60*60*24*15,"/");
setcookie("upass",$password, time()+60*60*24*15,"/");

//Trying to print the cookie if it exist
if(isset($_COOKIE['uname']) and isset($_COOKIE['upass'])){

    echo "Username = ".$_COOKIE['uname']."<br>";
    echo "Password = ".$_COOKIE['upass']."<br>";
}

?>