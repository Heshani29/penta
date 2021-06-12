
<?php
    $server = "localhost";
    $username ="root";
    $password ="";
    $dbaname ="login_register";

    $conn = mysqli_connect($server, $username,$password,$dbaname);

    if(isset($_POST['book']))
    {
        $ID = $_POST['ID'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $Sroom = $_POST['Sroom'];
        $Droom = $_POST['Droom'];
        $apartment = $_POST['apartment'];
       

        $query = "insert into book values('$ID','$fname','$email','$phone','$country','$Sroom','$Droom','$apartment')";
        $run = mysqli_query($conn,$query) or die(mysqli_error());
        if($run)
        {
            echo "<alert>dsjhsdjahj</alert>";
        }

        
    }
    if(isset($_POST['del']))
    {
        $date = $_POST['date'];
        $roomtype = $_POST['roomtype'];
        $qunatity = $_POST['qty'];
       
       
    }
?>