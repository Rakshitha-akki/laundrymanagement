<?php
    $name=$_POST["name"];
    $price=$_POST["price"];
    $msg="";

$conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);

$stmt=$conn->prepare("insert into price (itemname,price) values(?,?)");
$stmt->bindparam(1,$name);
$stmt->bindparam(2,$price);
//$status=$stmt->execute();
$status=$stmt->execute();
if($status==1)
        $msg="Item and price is added";
    else
        $msg="Failed to Add items and Price";
    header("location:adminoutput.php?msg=$msg");

    //echo $msg;
?>
<html>
    <head>
        <title>Add price</title>
    </head>
    <?php
         include'header_link.php';
    ?>
    <body>
    <?php
        include'header.php';
    ?>
    </body>
    <?php
        include'footer.php';
    ?>
</html>