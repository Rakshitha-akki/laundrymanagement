<?php
    include'header_link.php';
?>
<?php
    include'header.php';
?>
<!--<div style="display:flex; justify-content: space-around;">
<a href="changepasswordform.php">Change Password</a>
<a href="addpriceform.php">Add Price</a>
<a href="viewprice.php">View Price</a>
<a href="viewcustomer.php">View Customer</a>
<a href="updatebookingstatus.php">UpdateBooking Status</a>
<a href="viewbooking.php">View Booking</a>
<a href="viewreportbookingform.php">ViewReport Booking</a>
<a href="logout.php">Logout</a>
<a href="editpriceform.php">Edit price</a>
</div>-->
<?php
    $msg=$_REQUEST["msg"];
    echo $msg;
?>
<?php
    include'footer.php';
?>
