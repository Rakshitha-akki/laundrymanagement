<?php
    session_start();
    $booking_array=array();
    $bookingdate=$_POST["bookingdate"];
    $msg="";
    //1. connect to  database
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
    //$stmt is a prepared statement object
    $stmt=$conn->prepare("select * from booking where bookingdate=?");
    $stmt->bindparam(1,$bookingdate);
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
        header("location:adminoutput.php?msg=$msg");
    }
?>
<html>
    <head>
        <title> View Report Booking</title>
        </head>
        <?php
         include'header_link.php';
        ?>
        <body>
        <?php
         include'header.php';
        ?>
            <h3>View Report Booking</h3>
            <?php
                //find len of array
                $len=count($booking_array);
                if($len>0)
                {
                    echo "<table border=1>";
                    echo "<tr>";
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
                        //$bid=$booking_array[$i]["bookingid"];
                        $totalamount=$booking_array[$i]["totalamount"];
                        echo "<td>".$booking_array[$i]["bookingid"]."</td>";
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