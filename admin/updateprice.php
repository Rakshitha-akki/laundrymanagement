<?php
    include'header_link.php';
?>
<?php
    include'header.php';
?>
<?php

    //fetch input
    $itemcode=$_POST["itemcode"];
    $itemname=$_POST["itemname"];
    $price=$_POST["price"];
    
    $msg="";
    //update 
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);

    $stmt=$conn->prepare("update price set itemname=?,price=? where itemcode=?");
    $stmt->bindparam(1,$itemname);
    $stmt->bindparam(2,$price);
    $stmt->bindparam(3,$itemcode);
   
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0)
            $msg="Price Updated";
        else
            $msg="Price Update Failed";
        header("location:adminoutput.php?msg=$msg");
?>
<?php
    include'footer.php';
?>