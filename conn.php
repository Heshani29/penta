<?php
    $server = "localhost";
    $username ="root";
    $password ="";
    $dbaname ="login_register";

    $conn = mysqli_connect($server, $username,$password,$dbaname);

    if(isset($_POST['add']))
    {
        $roomtype = $_POST['roomtype'];
        $qunatity = $_POST['qty'];
       

        $query = "insert into room values('$roomtype','$qunatity')";
        $run = mysqli_query($conn,$query) or die(mysqli_error());
        if($run)
{
    mysqli_close($conn); // Close connection
    header("location:admin.php");
    exit;	
}
       
    }
?>