<html>
    <head>
        <title>Add price</title>
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
        '>Add price</h3><br><br>
            <form method="POST" action="addprice.php">
                <table border="1" width="60%" height="100px">
                    <tr>
                        <td>Item Name</td>
                        <td><input type="name" name="name" id="name"required></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="number" name="price" id="price"required></td>
                    </tr>
                    <tr>
                    <td colspan="2"><input type="submit" value="Submit"></td>
                </tr>
                </table>
            </form>

            <?php
                include'footer.php';
            ?>
    </body>
</html>