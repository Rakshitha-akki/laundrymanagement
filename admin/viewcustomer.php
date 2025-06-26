<?php
    $customer_array=array();
    $msg="";

    //1. connect to  database
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
    //$stmt is a prepared statement object
    $stmt=$conn->prepare("select * from customer");
    //execute
    $stmt->execute();
    //check how many rows are returned
    $c=$stmt->rowCount();
    if($c>0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($customer_array,$row);
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
        <title>View Customer</title>
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
        '>Customer Details</h3><br><br>
        <?php
            //find len of array
            $len=count($customer_array);
            if($len>0)
            {
                echo "<table border=1>";
                echo "<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
                echo "<td style=' text-align: center;'>customercode</td>";
                echo "<td style=' text-align: center;'>name</td>";
                echo "<td style=' text-align: center;'>address</td>";
                echo "<td style=' text-align: center;'>email</td>";
                echo "<td style=' text-align: center;'>phone</td>";
                echo "<td style=' text-align: center;'>city</td>";
                echo "<td style=' text-align: center;'>pincode</td>";
                echo "</tr>";
                for($i=0;$i<$len;$i++)
                {
                echo "</tr>";
                echo "<td style=' text-align: 300px;'>",$customer_array[$i]["customercode"]."</td>";
                echo "<td style=' text-align: center;'>",$customer_array[$i]["name"]."</td>";
                echo "<td style=' text-align: center;'>",$customer_array[$i]["address"]."</td>";
                echo "<td style=' text-align: center;'>",$customer_array[$i]["email"]."</td>";
                echo "<td style=' text-align: center;'>",$customer_array[$i]["phone"]."</td>";
                echo "<td style=' text-align: center;'>",$customer_array[$i]["city"]."</td>";
                echo "<td style=' text-align: center;'>",$customer_array[$i]["pincode"]."</td>";
                echo "</tr>";
                }
                echo "</table>";
            }
          
        ?>
        <?php
        include'footer.php';
        ?>
    </body>
</html>