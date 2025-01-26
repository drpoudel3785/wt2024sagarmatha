<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retriving the URLS Data</title>
</head>
<body>

<?php
$a=12;
// True because $a is empty
if (empty($a)) {
  echo "Variable 'a' is empty.<br>";
}
// True because $a is set
if (isset($a)) {
  echo "Variable 'a' is set";
}

//getting data from URL
if(isset($_GET['name'])){
    echo "You are Viewing ".$_GET['name']. " AND the action is ".$_GET['action'];
}

//isset() - is that variable is exist
//empty() - is that variable is empty
?>

    <a href="page.php?name=About&action=view">About</a>
    <a href="page.php?name=Contact&action=view">Contact</a>
    <a href="page.php?name=Download&action=view">Download</a>
    
</body>
</html>