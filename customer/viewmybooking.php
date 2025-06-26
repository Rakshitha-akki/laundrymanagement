<?php
    session_start();
    $booking_array=array();
    $msg="";

    //1. connect to  database
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
    //$stmt is a prepared statement object
    $stmt=$conn->prepare("select * from booking where customercode=?");
    $stmt->bindparam(1,$_SESSION["customercode"]);
    //execute
    $stmt->execute();
    //check how many rows are returned
    $c=$stmt->rowCount();
    if($c>0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($booking_array,$row);
        }
    }
    else
    {
        $msg="rows not found";
        header("location:customeroutput.php?msg=$msg");
    }
?>
<html>
    <head>
        <title>Booking details</title>
    </head>
    <?php
    include'header_link.php';
    ?>
    <style>
          tr:hover {background-color: rgba(255,255,255,0.3);}
        </style>
    <body>
    <?php
    include'header.php';
    ?>
    <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 10px;
        '>Booking details</h3><br><br>
        <?php
            //find len of array
            $len=count($booking_array);
            if($len>0)
            {
                echo "<table border=1>";
                echo "<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
                echo "<td>Booking Id</td>";
                echo "<td>Customer Code</td>";
                echo "<td>Booking Date</td>";
                echo "<td>Pickup Time</td>";
                echo "<td>Total Amount</td>";
                echo "<td>Status</td>";
                echo "</tr>";
                for($i=0;$i<$len;$i++)
                {
                echo "</tr>";
                $bid=$booking_array[$i]["bookingid"];
                $totalamount=$booking_array[$i]["totalamount"];
                echo "<td><a href=viewbookeditems.php?bookingid=$bid&totalamount=$totalamount>".$booking_array[$i]["bookingid"]."</td>";
                echo "<td>".$booking_array[$i]["customercode"]."</td>";
                echo "<td>".$booking_array[$i]["bookingdate"]."</td>";
                echo "<td>".$booking_array[$i]["pickuptime"]."</td>";
                echo "<td>".$booking_array[$i]["totalamount"]."</td>";
                echo "<td>".$booking_array[$i]["status"]."</td>";
                
                echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </body>
    <?php
    include'footer.php';
    ?>
</html>