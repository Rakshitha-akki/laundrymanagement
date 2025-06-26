<?php
    //session start
    session_start();
    $msg="";
    //fetchn input
        $Currentpassword=$_POST["Currentpassword"];
        $Newpassword=$_POST["Newpassword"];
        $Confirmpassword=$_POST["Confirmpassword"];

        //compare session password==currentpassword and newpassword==confirmpassword
        if($Currentpassword==$_SESSION["password"])
        {
            if($Newpassword==$Confirmpassword)
            {
                //if yes,
                //connect to db and update new password in admintable
                $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                try{
                    $stmt=$conn->prepare("update admin set password=? where email=?");
                    $stmt->bindparam(1,$Newpassword);
                    $stmt->bindparam(2,$_SESSION["email"]);
                    $stmt->execute();
                    $c=$stmt->rowCount();
                    if($c==1)
                    {
                        //update session password with newpassword
                        $_SESSION["password"]=$Newpassword;
                        $msg="password updated successfully";
                    }
                    else
                    {
                        $msg="Update password failed";
                    }
                }
                catch(Exception $e)
                {
                    $msg="Update failed".$e->getMessage();
                }
            }
            else
            {
                $msg="new and confirm password do not match";
            }
        }
        else
        {
            $msg="Current password is invalid";
            header("location:adminoutput.php?msg=$msg");


        }
?>
<html>
    <head>
        <title>change password</title>
    </head>
    <?php
    include'header_link.php';
    ?>
    <body>
    <?php
    include'header.php';
    ?>
    <?php
    include'footer.php';
    ?>
    </body>
</html>