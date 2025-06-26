<?php
    include'header_link.php';
?>
<?php
    include'header.php';
?>
<!--<div style="display:flex; justify-content: space-around;">
<a href="addbookingform.php">Add Booking</a>
<a href="changepasswordform.php">Change Password</a>
<a href="cancelbookingform.php">cancel booking</a>
<a href="viewmybooking.php">View my Booking</a>
<a href="editprofileform.php">Edit profile</a>
<a href="logout.php">Logout</a>
</div>-->
<?php
    $msg=$_REQUEST["msg"];
    echo $msg;
?>

<?php
    include'footer.php';
?>