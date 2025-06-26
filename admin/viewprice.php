<?php
    $price_array=array();
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
            array_push($price_array,$row);
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
        <title>View Price</title>
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
          width: 200px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 10px;
        '>View Price</h3><br><br>
        <?php
            //find len of array
            $len=count($price_array);
            if($len>0)
            {
                echo "<table border=1 >";
                echo "<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
                echo "<td>Itemcode</td>";
                echo "<td>Itemname</td>";
                echo "<td>Price</td>";
                echo "</tr>";
                for($i=0;$i<$len;$i++)
                {
                echo "<tr>";
                echo "<td>".$price_array[$i]["itemcode"]."</td>";
                echo "<td>".$price_array[$i]["itemname"]."</td>";
                echo "<td>".$price_array[$i]["price"]."</td>";
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