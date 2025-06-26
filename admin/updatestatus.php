<?php
    include'header_link.php';
?>
<?php
    include'header.php';
?>
<?php
    //fetch input
    $status=$_POST["status"];
    $bookingid=$_POST["bookingid"];
    $msg="";
    //update 
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);

    $stmt=$conn->prepare("update booking set status=? where bookingid=?");
    $stmt->bindparam(1,$status);
    $stmt->bindparam(2,$bookingid);
    
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0)
            $msg="Status Updated";
        else
            $msg="Status Update Failed";
        header("location:adminoutput.php?msg=$msg");
?>
<?php
    include'footer.php';
?>