<?php
/* Multiple 
line comments
*/
//SIngle Line Comments
$name="Dharma";
echo gettype($name);
$payment=False;
echo gettype($payment);
$names=array("Abash","Anuj","Nikita");
echo gettype($names);
echo "<br>";
$num1=100;
$num2=200;
$sum=$num1+$num2;
echo "The sum of $num1 and $num2 is $sum";
echo "<br>";
echo 'The sum of '.$num1. ' and '.$num2.' is '.$sum;
echo "<br>";
echo 'The sum of $num1 and $num2 is $sum';
echo "<br>";
$today=date("l");//Monday
if($today=="Friday" or $today=="Saturday"){
    echo "HUrray!. Holiday";
}
else{
    echo $today. "Is just another college regular days.";
}
echo "<br>";
//alternatively we can use the switch case
switch($today){
    case 'Friday':
    case 'Saturday':{
        echo "HUrray!. Holiday";
        break;
    }
    default:
        echo $today. "Is just another college regular days.";
}
echo "<br>";
//defining the constant
define("NAME","Sagarmatha");
echo  NAME;

$names=array("Abash","Anuj","Nikita", "Rohit");
echo "\n Printing Anuj";
echo"<br>";
echo $names[1];
echo "<br>";
foreach($names as $n){
    echo $n. "<br>";
}
echo "<br>";
//Associative Array
$names=array("Abash"=>21,"Anuj"=>23,"Nikita"=>20, "Rohit"=>22);
//prinintg nikitas amount
echo $names['Nikita'];
echo "<br>";
echo "Printing all Names with their amount<br>";
foreach($names as $key=>$value){
    echo "$key has $value Amount at this present<br>";
}
echo "<br>";
var_dump($names);



?>