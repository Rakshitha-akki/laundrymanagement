<?php
    session_start();
    $bookingid=$_REQUEST["bookingid"];
    $status=$_REQUEST["status"];
    $msg="";
?>
<html>
    <head>
        <title>Update Status</title>
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
        '>Update Status</h3><br><br>
            <form method="POST" action="updatestatus.php">
                <table border="1" width="60%" height="100px">
                <tr>
                        <td>Booking Id</td>
                        <td><input type="id" name="bookingid" id="bookingid"value=<?php echo $bookingid;?> readonly></td>
                </tr>
                <tr>
                        <td>Status</td>
                        <?php
                            if ($status=='Booked')
                            {
                                echo "<td>";
                                echo "<select name=status>";
                                echo "<option>Confirmed</option>";
                                echo "</select>";
                                echo "</td>";

                            }
                            else if ($status=='Confirmed')
                            {
                                echo "<td>";
                                echo "<select name=status>";
                                echo "<option>Pickup</option>";
                                echo "</select>";
                                echo "</td>";
                            }
                            else if($status=='Pickup')
                            {
                                echo "<td>";
                                echo "<select name=status>";
                                echo "<option>Process</option>";
                                echo "</select>";
                                echo "</td>";
                            }
                            else if($status=='Process')
                            {
                                echo "<td>";
                                echo "<select name=status>";
                                echo "<option>Delivered</option>";
                                echo "</select>";
                                echo "</td>";
                            }
                            
                            

                        ?>
                        
                </tr> 
                <tr>
                    <td colspan="2"><input type="submit" value="Submit"></td>
                </tr>
                </table>
            </form>
    </body>
    <?php
         include'footer.php';
    ?>
</html>