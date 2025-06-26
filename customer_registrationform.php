<html>
    <head>
        <title>customer registration form</title>
        <script>
            function validate()
            {
                var textphonepattern=/^[0-9]{10}$/;
                var tphone=document.forms["regform"]["phone"].value;
                if(tphone.search(textphonepattern)==-1)
                {
                    document.getElementById("phoneresult").innerHTML="Phone number should contain only digits and minimum10";
                    return false;
                }

                //var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            }
        </script>
        <style>
            body{
                /* background-color:#ffd9b3; */
                background-image:url("bg1.jpg");
            }
            .tablee,td,tr{
                padding:12px;
                        align:center;
                        /* border: 1px solid black; */
                        color:#336699;
                        font-weight:800;
            
                    }
                    
                    
                
                    button:hover {
                        
                        background-color:white;
                        color:#336699;
                        
                    }
                    h4{
                margin-top:3px;
                margin-bottom:3px;
                color:#2e5cb8;
                font-size:24px;
                
            }
            input{
                padding:3px 23px 3px 23px;
                border:2px solid #336699;
                border-radius:8px;
            }
            form{
                /* border:2px solid #336699; */
                margin-top:39px;
            }
            

            textarea{
                border:2px solid #336699;
                border-radius:4px;
            }
            table{
                /* border: 1px solid black; */
                margin-bottom:23px;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="customer_registration.php" name="regform" onsubmit="return validate();" style="">
            <h4 align="center">CUSTOMER REGISTRATION FORM</h4>
            <table name="tablee" align="center">
               
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" id="name" maxlength="20" minlength="3" required autofocus></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><textarea id="address" name="address" required></textarea></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" id="email" required></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" id="city" required></td>
                </tr>
                <tr>
                    <td>Pincode</td>
                    <td><input type="text" name="pincode" id="pincode" maxlength="6" minlength="6" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="Newpassword" id="Newpassword" maxlength="8" minlength="6" required></td>
                </tr>
                <tr>
                    <td>confirm password</td>
                    <td><input type="password" name="Confirmpassword" id="Confirmpassword" maxlength="8" minlength="6" required></td>
                    <p id="result" style="color: tomato; margin-left:434px; font-weight:bold;"></p>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="phone" name="phone" id="phone" maxlength="10" minlength="10" required></td>
                    <p id="phoneresult" style="color: tomato; margin-left:434px; font-weight:bold;"></p>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="submit" name="btn"  id="btn" style="border:2px solid #336699; margin-left:2px;font-weight:900; padding: 5px 153px 5px 153px; color:white;background-color:#336699; letter-spacing:1px;"></td>
                </tr>
            </table>
            <div class="signin" align="center" style="font-weight:800;color:#00061a;text-decoration:none;">Do you have an account?
                <a href="customerloginform.php">Signin Now</a>
            </div>
            <!-- <div id="result">

            </div> -->
        </form>
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
