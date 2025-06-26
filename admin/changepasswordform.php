<html>

<head>

<title>Change password form</title>

<?php
                include'header_link.php';
            ?>
    </head>
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
          margin-left: 1s0px;
        '>Change Password</h3><br><br>
            <form method="POST" action="changepassword.php">
                <table border="1">
                    <tr>
                        <td>Current password</td>
                        <td><input type="password" name="Currentpassword" id="Currentpasswpord" maxlength="8" minlength="6" required autofocus></td>
                    </tr>
                    <tr>
                        <td>New password</td>
                        <td><input type="password" name="Newpassword" id="Newpassword" maxlength="8" minlength="6" required></td>
                    </tr>
                    <tr>
                        <td>confirm password</td>
                        <td><input type="password" name="Confirmpassword" id="Confirmpassword" maxlength="8" minlength="6" required></td>
                    </tr>
                    <tr>
                    <td colspan="2"><input type="submit" value="update" name="btn"  id="btn" disabled></td>
                </tr>
                </table>
                <div id="result">

                </div>
            </form>
            <?php
                include'footer.php';
            ?>
            <script>
            document.getElementById("Confirmpassword").addEventListener("blur",function(){

                var npassword=document.getElementById("Newpassword").value;
                var cpassword=document.getElementById("Confirmpassword").value;
                if(npassword!=cpassword)
                {
                    var msg="New password and confirm password do not match";
                    document.getElementById("result").innerHTML=msg;
                    document.getElementById("btn").disabled=true;
                }
                else
                {

                document.getElementById("btn").disabled=false;
                document.getElementById("result").innerHTML="";
                    
                }
            });
            </script>
    </body>
</html>