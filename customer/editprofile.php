<?php
    //fetch input
    $email=$_POST["email"];
    $customer_array=array();
    $msg="";

    //search
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
    $stmt=$conn->prepare("select * from customer where email=?");
    $stmt->bindParam(1,$email);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($customer_array,$row);
        }
    }
    else
    {
        $msg="row not found";
        header("location:customeroutput.php?msg=$msg");
    }
?>
<html>
    <head>
        <title> edit customer details</title>
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
        '>Edit My Profile</h3><br><br>
        <form method="POST" action="updateprofile.php">
            <table border="1">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="<?php echo $customer_array[0]['name'];?>"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" value="<?php echo $customer_array[0]['address'];?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" readonly value="<?php echo $customer_array[0]['email'];?>"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value="<?php echo $customer_array[0]['phone'];?>"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" value="<?php echo $customer_array[0]['city'];?>"></td>
                </tr>
                <tr>
                    <td>Pincode</td>
                    <td><input type="text" name="pincode" value="<?php echo $customer_array[0]['pincode'];?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" readonly value="<?php echo $customer_array[0]['password'];?>"></td>
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