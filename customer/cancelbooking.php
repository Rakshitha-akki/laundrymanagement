<?php
    include'header_link.php';
?>
<?php
    include'header.php';
?>
<?php
    session_start();
    $bookingid=$_REQUEST["bookingid"];
    $msg="";

    //1. connect to  database
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
    //$stmt is a prepared statement object
    $stmt=$conn->prepare("delete from bookeditems where bookingid=?");
    $stmt->bindParam(1,$bookingid);
    $stmt->execute();

    $stmt=$conn->prepare("delete from booking where bookingid=?");
    $stmt->bindParam(1,$bookingid);
    //execute
    $status=$stmt->execute();
    if($status>=1)
        $msg="Booking Canceled";
    else
        $msg="Booking Cancel Failed";
    header("location:customeroutput.php?msg=$msg");
?>
<?php
    include'footer.php';
?>