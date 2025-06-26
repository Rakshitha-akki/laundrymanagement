<html>
    <head>
        <title>View Report Booking</title>
    </head>
    <?php
         include'header_link.php';
    ?>
    <body>
    <?php
         include'header.php';
    ?>
    <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 350px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 10px;
        '>View Report Booking</h3><br><br>
        <form method="POST" action="viewreportbooking.php">
            <table border="1">
                <tr>
                    <td>date</td>
                    <td><input type="date" name="bookingdate" id="date"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="submit"></td>
                </tr>
            </table>
        </form>
    </body>
    <?php
         include'footer.php';
    ?>
</html>