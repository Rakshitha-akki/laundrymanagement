<?php
session_start();
//fetch input 
$email=$_POST["email"];
$password=$_POST["password"];
$msg="";

//open database connection and check if email and pwd is present in table
$conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try{
    $stmt=$conn->prepare("select * from admin where email=? and password=?");
    $stmt->bindparam(1,$email);
    $stmt->bindparam(2,$password);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c==1)
    {
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$password;
        header('location:admin/home.php');
    }
    else
    {
        $msg="Invalid Login";
        header("location:output.php?msg=$msg");
    }
}
catch(Exception $e)
{
    $msg="Invalid Login".$e->getMessage();
    header("location:output.php?msg=$msg");
}
?>
<html>
    <head>
        <title>Admin Login</title>
    </head>
    <body>
        <?php
        //echo $msg;
        ?>
    </body>
</html>