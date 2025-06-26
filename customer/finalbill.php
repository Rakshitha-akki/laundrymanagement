<?php
    include'header_link.php';
?>
<?php
    include'header.php';
?>
<?php 
    session_start();
    //array
    $itemcode=$_POST["itemcode"];
    $itemname=$_POST["itemname"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $amount=$_POST["amount"];

    //not arrays
    $totalamount=$_SESSION["totalamount"];
    $pickuptime=$_POST["pickuptime"];
    $bookingdate=Date("Y/m/d");
    $status="New";
    $msg="";

    echo $_SESSION["customercode"]." ".$bookingdate." ".$pickuptime." ".$totalamount;
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
    $stmt=$conn->prepare("insert into booking (customercode,bookingdate,pickuptime,totalamount,status) values(?,?,?,?,'Booked')");
    $stmt->bindparam(1,$_SESSION["customercode"]);
    $stmt->bindparam(2,$bookingdate);
    $stmt->bindparam(3,$pickuptime);
    $stmt->bindparam(4,$totalamount);
    $status=$stmt->execute();
    $len=count($itemcode);
    $bookingid=$conn->lastInsertId();
    for($i=0;$i<$len;$i++)
    {
        $stmt1=$conn->prepare("insert into bookeditems(bookingid,itemcode,quantity,price,amount)
         values(?,?,?,?,?)");
        $stmt1->bindparam(1,$bookingid);
        $stmt1->bindparam(2,$itemcode[$i]);
        $stmt1->bindparam(3,$quantity[$i]);
        $stmt1->bindparam(4,$price[$i]);
        $stmt1->bindparam(5,$amount[$i]);
        $stmt1->execute();
    }
    echo "<br><br>";
    if($status==1)
        $msg="Booking is successfully done";
    else
        $msg="Booking failed,please try again";
    header("location:customeroutput.php?msg=$msg");
?>
<?php
    include'footer.php';
?>

