<?php

include "conn.php"; // Using database connection file here

$roomtype = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from room where roomtype = '$roomtype'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:admin.php");
    exit;	
}
else
{
    echo "<script>swal('Booking Confirmed', 'Dear sir your booking is confirmed. We will send you a confirmation mail soon. Thank you', 'warning');</script>";
}
?>