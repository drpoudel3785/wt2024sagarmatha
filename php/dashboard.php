<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
echo "Welcome ". $_SESSION['username'];
echo "<a href=logout.php> Logout </a>";
echo "Dashboard. Restricted Page";
?>