<html>
    <head>
        <title>Edit Profile</title>
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
          width: 250px;
          height: 50px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 10px;
        '>Edit Profile</h3><br><br>
        <form method="POST" action="editprofile.php">
            <table border="1">
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
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
</html>ss