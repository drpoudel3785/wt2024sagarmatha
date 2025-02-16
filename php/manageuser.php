<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    //collecting data from the form
    $id=$_POST['id'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $role=$_POST['role'];
    $status=$_POST['status'];
    $imagename=$_FILES['upload']['name'];
    $imagetype=$_FILES['upload']['type'];
    $imagesize=$_FILES['upload']['size'];
    $imagetmp=$_FILES['upload']['tmp_name'];
    $uploadname="uploads/".$imagename;
    move_uploaded_file($imagetmp,$uploadname);
    //writing the update query
    $sql = "UPDATE users SET username='$username', email='$email', role='$role' , status='$status', photo='$imagename' WHERE id=$id";

    //making db connection
    include("connection.php");
    //executing the sql statement
    $qry=mysqli_query($conn, $sql) or die(mysqli_error());
    if($qry){
        header("Location: register.php");
    }
}
//capturing the urls data
$id=$_GET['id'];
$action=$_GET['action'];
if(!empty($id) && !empty($action)){
    switch($action){
        case 'edit':
            {
                $sql ="SELECT * FROM users WHERE id=$id";
                include("connection.php");
                $qry=mysqli_query($conn, $sql) or die(mysqli_error());
                while($row=mysqli_fetch_array($qry)){
                    $eid=$row['id'];
                    $eusername=$row['username'];
                    $eemail=$row['email'];
                    $erole=$row['role'];
                    $estatus=$row['status'];
                }
                echo "<form method=post action='' name=edituser enctype=multipart/form-data>";
                echo "<input type=text name=id value=$eid readonly><br>";
                echo "<input type=text name=username value=$eusername > <br>";
                echo "<input type=text name=email value=$eemail ><br>";
                echo "<input type=text name=role value=$erole ><br>";
                echo "<input type=number name=status value=$estatus ><br>";
                echo "<input type=file name=upload  ><br>";
                echo "<input type=submit name=submit value=Edit>";
                echo "</from>";
                
                break;
            }
        case 'delete':{
            $sql ="DELETE FROM users WHERE id=$id";
            include("connection.php");
            $qry=mysqli_query($conn, $sql) or die(mysqli_error());
            header("Location: register.php");
            break;
        }
        default:{
            echo "You are not allow to perform the task";
        }
    }

}
else{
    header("Location: register.php");
}

?>