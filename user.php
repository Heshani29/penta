<?php 
include "conn.php";
include "update.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page - KJV</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Kandy Jungle <span>View</span></h3>
      </div>
      <div class="right_area">
        <a href="logout.php" class="logout_btn">Logout</a>

      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <center>
       <img src="logo.png" alt="">
        <h4>
        <?php echo "<h4>Welcome " . $_SESSION['username'] . "</h4>"; ?>
        </h4>
      </center>
      <a href="admin.php"><i class="fa fa-bed" aria-hidden="true"></i><span>Hotel Rooms</span></a>
      <a href="user.php"><i class="fa fa-male" aria-hidden="true"></i><span>Customers</span></a>
     
    </div>
    <!--sidebar end-->

    <div class="row justify-content-center">

        <h3>Customers</h3> <br>
            
              <table border="1" class="table1" style="width: 1000px;">
        <tr>
          <td><b>NIC Number</b></td>
          <td><b>Name</b></td>
          
          <td><b>Email</b></td>
          <td><b>Contact Number</b></td>
          <td><b>Country</b></td>
          <td><b>Delete</b></td>
        </tr>

      <?php

      include "conn.php"; // Using database connection file here

      $records = mysqli_query($conn,"select ID,fname,email,phone,country from book"); // fetch data from database

      while($data = mysqli_fetch_array($records))
      {
      ?>
        <tr>
        
          <td><?php echo $data['ID']; ?></td>
          <td><?php echo $data['fname']; ?></td>
          <td><?php echo $data['email']; ?></td>
          <td><?php echo $data['phone']; ?></td>
          <td><?php echo $data['country']; ?></td>
          <td> <br><a href="delcustomer.php?id=<?php echo $data['ID']; ?>"><div class="btn2" style="padding-left:40px"><input type="submit" class="del" value="Delete"></a></div><br></td>

        </tr>	
      <?php
      }
      ?>
      </table>
          </div>

        </body>
        <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</html>
      