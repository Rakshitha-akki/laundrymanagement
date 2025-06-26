<?php
session_start();
//array
    $itemcode=$_POST["itemcode"];
    $itemname=$_POST["itemname"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $amount=array();
    $totalamount=0;
    $msg="";

    $len=count($itemcode);
    for($i=0;$i<$len;$i++)
    {
        $a=$price[$i]*$quantity[$i];
        $totalamount+=$a;
        array_push($amount,$a);
    }
    $_SESSION["totalamount"]=$totalamount;

?>
<html>
    <head>
        <title>Calculate Bill</title>
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
        <div>
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
        '>Calculate Bill</h3><br><br>
            
            <form method="POST" action="finalbill.php">
                <?php
                    date_default_timezone_set("Asia/Calcutta");
                    $h=date('h');
                    if($len>0)
                    {
                        echo "Pickup Time";
                        echo "<select name=pickuptime  id=pickuptime>";
                        for($i=$h+1; $i<22;$i++)
                        {
                            echo "<option>$i</option>";
                        }
                        echo "</select>";
                        
                        echo "<br>";
                        echo "<br>";
                        echo "<table border=1>";
                        echo "<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
                        echo "<td>Item code</td>";
                        echo "<td>Item Name </td>";
                        echo "<td>Price</td>";
                        echo "<td>Quantity</td>";
                        echo "<td>Total Amount</td>";
                            
                        echo "</tr>";
                        $len=count($itemcode);
                        for($i=0;$i<$len;$i++)
                        {
                            echo "<tr>";
                            echo "<td><input type=text name=itemcode[] readonly value=".$itemcode[$i]."></td>";
                            echo "<td><input type=text name=itemname[] readonly value=".$itemname[$i]."></td>";
                            echo "<td><input type=text name=price[] readonly value=".$price[$i]."></td>";
                            echo "<td><input type=text name=quantity[] readonly value=".$quantity[$i]."></td>";
                            echo "<td><input type=text name=amount[] readonly value=".$amount[$i]."></td>";
                            echo "</tr>";
                        }
                        echo "<tr><td>";
                        echo "Total amount=".$totalamount;
                        echo "</td></tr>";
                        echo "</table>";
                        echo '<td colspan="2"><input type="Submit" value="Button"></td>';
                    }
                ?>
            </form>
        </div>
        <script> 
        </script> 
    </body>
    <?php
         include'footer.php';
    ?>
</html>