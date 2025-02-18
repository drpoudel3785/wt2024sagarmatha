<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name=$_FILES['upload']['name'];
        $type=$_FILES['upload']['type'];
        $size=$_FILES['upload']['size'];
        $tmpname=$_FILES['upload']['tmp_name'];

        $ulocation="uploads/".$name;
        if($type=="images/jpeg" || $type=="images/jpg" || $type=="images/png" ||$type=="images/gif" || $type=="images/webp"    )
        {
            
            if(move_uploaded_file($tmpname, $ulocation)){
                $sql = "INSERT INTO uploads(name) VALUES ('$name')";
                include("connection.php");
                $qry=mysqli_query($conn, $sql) or die("Unable to upload the image");
            }
        }
    else{
        echo "Un Supported File Format";
    }

        
    }

    ?>
    <form method="POST" name="fileupload" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>File UPload Example</legend>
        <input type="file" name="upload"><br>
        <input type="submit" name="submit" value="upload">
    </fieldset>
    </form>

    <hr>
    <h2>Latest Uloads</h2>
    <table border=0 width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>

            <?php
            
            $sql ="SELECT * FROM uploads ORDER BY ID DESC";
            include("connection.php");
            $qry=mysqli_query($conn, $sql) or die("unable to show the records");
            $count=mysqli_num_rows($qry);
            echo "We have $count Records";
            if($count>=1){
                while($row=mysqli_fetch_array($qry))
                {
                    
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td><img src=uploads/".$row['name']." width=150px></td>";
                echo "</tr>";

                }

            }
            else{
                echo "Sorry no uploads found";
            }
            

            ?>
           
        </tbody>
</table>
    
</body>
</html>