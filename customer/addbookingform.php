<?php
    $booking_array=array();
    $msg="";

    //1. connect to  database
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
    //$stmt is a prepared statement object
    $stmt=$conn->prepare("select * from price");
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
        <title>Add Booking</title>
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
        '>Add Booking</h3><br><br>
        <form method="POST" action="addqtyform.php">
        <?php
            //find len of array
            $len=count($booking_array);
            if($len>0)
            {
                echo "<table border=1>";
                echo "<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
                echo "<td>itemcode</td>";
                echo "<td>itemname</td>";
                echo "<td>price</td>";
                echo "<td>Select</td>";
                
                echo "</tr>";
                for($i=0;$i<$len;$i++)
                {
                echo "<tr>";
                $item=$booking_array[$i]["itemcode"];
                echo '<td class="12"><input type=text value='.$item.' readonly></td>';
                echo "<td>".$booking_array[$i]["itemname"]."</td>";
                echo "<td>".$booking_array[$i]["price"]."</td>";
                $ic=$booking_array[$i]["itemcode"].":".urlencode($booking_array[$i]["itemname"]).":".$booking_array[$i]["price"];
                
                echo "<td><input type=checkbox name=items[] value=$ic></td>";
                echo "</tr>";
                }
                
                echo "</table>";
                
                echo '<td colspan="2"><input type="submit" value="Submit"></td>';
            }
        ?>
        </form>
    </body>
    <?php
         include'footer.php';
    ?>
</html>
