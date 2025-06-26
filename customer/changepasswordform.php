<html>
    <head>
        <title>Change password form</title>
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
          height: 50px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 10px;
        '>Change Password</h3><br><br>
            <form method="POST" action="changepassword.php">
                <table border="1">
                    <tr>
                        <td>Current password</td>
                        <td><input type="password" name="Currentpassword" id="Currentpasswpord"required></td>
                    </tr>
                    <tr>
                        <td>New password</td>
                        <td><input type="password" name="Newpassword" id="Newpassword"required></td>
                    </tr>
                    <tr>
                        <td>confirm password</td>
                        <td><input type="password" name="Confirmpassword" id="confirmpassword"required></td>
                    </tr>
                    <tr>
                    <td colspan="2"><input type="submit" value="update"></td>
                </tr>
                </table>
            </form>
    </body>
    <?php
    include'footer.php';
    ?>
</html>