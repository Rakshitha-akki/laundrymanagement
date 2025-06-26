<?php
$name=$_POST["name"];
$address=$_POST["address"];
$email=$_POST["email"];
$city=$_POST["city"];
$pincode=$_POST["pincode"];
$password=$_POST["Newpassword"];
$phone=$_POST["phone"];

$msg="";

$conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);

$stmt=$conn->prepare("insert into customer (name,address,email,phone,city,pincode,password) values(?,?,?,?,?,?,?)");
$stmt->bindparam(1,$name);
$stmt->bindparam(2,$address);
$stmt->bindparam(3,$email);
$stmt->bindparam(4,$phone);
$stmt->bindparam(5,$city);
$stmt->bindparam(6,$pincode);
$stmt->bindparam(7,$password);

$status=$stmt->execute();
if($status==1)
{
    $msg="Thank You,Your Registration is successfully Done";
    header('location:customerloginform.php');
}
else
    $msg="Registration failed,Please try again";
    header("location:output.php?msg=$msg");
    //echo $msg;
?>
