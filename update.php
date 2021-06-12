<?php

include "conn.php"; 

if(isset($_POST['update']))
    {
        $roomtype = $_POST['roomtype'];
        $quantity = $_POST['qty'];
        $update = mysqli_query($conn,"update room set quantity ='$quantity' where roomtype = '$roomtype'") or die(mysqli_error());
        if($update)
        {
            mysqli_close($conn); // Close connection
            header("location:admin.php");
            
            exit;	
        }
        else
        {
            echo "cannot update";
        }
       
    }
?>