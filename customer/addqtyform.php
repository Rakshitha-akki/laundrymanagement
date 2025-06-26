<?php
    //fetch input
    $itemcode_array=$_POST["items"];
     
    $msg="";
?>
<html>
    <head>
        <title>Edit</title>
    </head>
    <?php
        include'header_link.php';
    ?>
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
        '>Add Quantity</h3><br><br>
        <form method="POST" action="calculatebill.php">
            <?php
             echo "<table border=1>";
            //find len of array
            $len=count($itemcode_array);
            echo "<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
            echo "<th>Item code</th>";
            echo "<th>Item name</th>";
            echo "<th>Item price</th>";
            echo "<th>Quantity</th>";
            echo "</tr>";
            for($i=0;$i<$len;$i++)
            {
                $a=explode(":",$itemcode_array[$i]);
                echo "<tr>";
                echo "<td><input type=text name=itemcode[] readonly value=".$a[0]."></td>";
                echo "<td><input type=text name=itemname[] readonly value=".urldecode($a[1])."></td>";
                echo "<td><input type=text name=price[] readonly value=".$a[2]."></td>";                
                echo "<td><input type=text name=quantity[]></td>"; 
                echo "</tr>";
            }
              
            echo "</table>";
            ?>
            <tr>
                
                <td colspan="2"><input type="submit" value="Submit"></td>
            </tr>
        </form>
    </body>
    <?php
        include'footer.php';
    ?>
</html>
 