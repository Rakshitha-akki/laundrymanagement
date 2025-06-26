<?php
    session_start();
    //get url parameters
    $bookingid=$_REQUEST["bookingid"];
    $totalamount=$_REQUEST["totalamount"];
    $booking_array=array();
    //$a=0;
    $msg="";
    //1. connect to  database
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
    //$stmt is a prepared statement object
    $stmt=$conn->prepare("select bookeditems.itemcode, itemname, bookeditems.price, quantity, amount from 
    bookeditems inner join price on bookeditems.itemcode=price.itemcode where bookingid=?");
    $stmt->bindParam(1,$bookingid);
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
        <title>Booking details</title>
    </head>
    <?php
         include'header_link.php';
    ?>
    <body>
    <style>
          tr:hover {background-color: rgba(255,255,255,0.3);}
        </style>
    <?php
         include'header.php';
    ?>
    <br><hr>
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
                echo "<td>ItemCode</td>";
                echo "<td>ItemName</td>";
                
                echo "<td>Quantity</td>";
                echo "<td>Price</td>";
                echo "<td>Amount</td>";
                echo "</tr>";
                for($i=0;$i<$len;$i++)
                {
                echo "</tr>";
                echo "<td>".$bookingid."</td>";
                echo "<td>".$booking_array[$i]["itemcode"]."</td>";
                echo "<td>".$booking_array[$i]["itemname"]."</td>";                
                echo "<td>".$booking_array[$i]["quantity"]."</td>";
                echo "<td>".$booking_array[$i]["price"]."</td>";
                echo "<td>".$booking_array[$i]["amount"]."</td>";
                echo "</tr>";
                }
                echo "<tr><td>Total amount=".$totalamount."</td></tr>";
                echo "</table>";
            }
            
        ?>
    </body>
    <?php
         include'footer.php';
    ?>
</html>
    