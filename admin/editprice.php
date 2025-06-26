<?php
    //get url parameters
    $itemcode=$_REQUEST["ic"];
    $itemname=urldecode($_REQUEST["in"]);
    $price=$_REQUEST["ip"];
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
    <h3 style=' border-radius: 25px;
        border: 2px solid #73AD21;
        padding: 12px;
        width: 350px;
        height: 60px;
        align:center;
        background-color:orange;
        text-align: center;
        margin-left: 10px;
      '>Edit Price And Items</h3><br><br>
        
            <form method="POST" action="updateprice.php">
                <table border="1" width="60%" height="150px">
                    <tr>
                        <td>Item Code</td>
                        <td><input type="text" name="itemcode" value="<?php echo $itemcode;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Edit Item Name</td>
                        <td><input type="text" name="itemname" value="<?php echo $itemname;?>" autofocus required></td>
                    </tr>
                    <tr>
                        <td>Edit Item Price</td>
                        <td><input type="number" name="price" value="<?php echo $price;?>" required></td>
                    </tr>
                    <tr>
                    <td colspan="2"><input type="submit" value="Update"></td>
                </tr>
                </table>
            </form>
        <?php
            include'footer.php';
        ?>
    </body>
</html>
