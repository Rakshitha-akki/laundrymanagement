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
    <body>
    <?php
         include'header.php';
    ?>
        <h3>View Customer</h3>
        <?php
            //find len of array
            $len=count($customer_array);
            if($len>0)
            {
                echo "<table border=1>";
                echo "<tr>";
                echo "<td>customercode</td>";
                echo "<td>name</td>";
                echo "<td>address</td>";
                echo "<td>email</td>";
                echo "<td>phone</td>";
                echo "<td>city</td>";
                echo "<td>pincode</td>";
                echo "</tr>";
                for($i=0;$i<$len;$i++)
                {
                echo "</tr>";
                $customercode=$customer_array[$i]["customercode"];
                echo "<td><a href=selectitems.php?customercode=$customercode>".$customer_array[$i]["customercode"]."</td>";
                echo "<td>",$customer_array[$i]["customercode"]."</td>";
                echo "<td>",$customer_array[$i]["name"]."</td>";
                echo "<td>",$customer_array[$i]["address"]."</td>";
                echo "<td>",$customer_array[$i]["email"]."</td>";
                echo "<td>",$customer_array[$i]["phone"]."</td>";
                echo "<td>",$customer_array[$i]["city"]."</td>";
                echo "<td>",$customer_array[$i]["pincode"]."</td>";
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