<?php
include "conn.php";
include "update.php";
session_start();

// if (!isset($_SESSION['username'])) {
//   header("Location: index.php");
// }

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

    <div class="form-group">
      <form action="" method="POST" class="f1" name="form1" style="width:450px">
        <table>
          <tr>
            <td><br><b> NIC</b></td>
            <td> <br>
              <div class="textbox" style="padding-left:50px"> <input type="text" name="roomtype" required placeholder="Room Type" style="width: 100%;
                    padding: 15px;
                    margin: 5px 0 22px 0;
                    border: none;
                    background: #f1f1f1;"></div>
            </td>
          </tr>
          <tr>
            <td> <br><b> Quantity</b></td>
            <td><br>
              <div class="textbox" style="padding-left:50px"> <input type="text" name="qty" required placeholder="Number of rooms" style="width: 100%;
                    padding: 15px;
                    margin: 5px 0 22px 0;
                    border: none;
                    background: #f1f1f1;"></div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <br>
              <div style="  padding-left: 100px;">
                <input type="submit" name="add" value="ADD" class="btn">

              </div>
            </td>
          </tr>
        </table> <br>
      </form>
    </div>
    <h3>Hotel Rooms</h3> <br>

    <table border="1" class="table1">
      <tr>
        <td><b> Room Type</b></td>
        <td><b>Quantity</b></td>
        <td><b>Action</b></td>
      </tr>

      <?php

      include "conn.php"; // Using database connection file here

      $records = mysqli_query($conn, "select * from room"); // fetch data from database

      while ($data = mysqli_fetch_array($records)) {
        $roomtype_ =  $data['roomtype'];
        $quantity_ =  $data['quantity'];
      ?>
        <tr>
          <td><?php echo $roomtype_ ?></td>
          <td><?php echo $quantity_ ?></td>
          <td> <a href="delete.php?id=<?php echo $roomtype_ ?>">
              <div class="btn2"><input type="submit" class="del" value="Delete"></div></a>            
            <br><input class="btn" value="Update" name="edit" onclick="openForm('<?php echo $roomtype_ ?>','<?php echo $quantity_ ?>')"><br>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>

    <div class="form-popup" id="myForm">
      <form action="update.php" class="form-container" method="POST">
        <h1>Update</h1>
        <label for="roomtype"><b>Room Type</b></label>
        <input type="text" name="roomtype" id="roomtype">

        <label for="qty"><b>Quantity</b></label>
        <input type="number" name="qty" id="qty">

        <input type="submit" class="btn" name="update" value="Update">
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>

</body>
<script>
  function openForm(roomtype, quantity) {
    if (roomtype !== null) {
      document.getElementById("roomtype").value = roomtype;
    }
    if (quantity !== null) {
      document.getElementById("qty").value = quantity;
    }
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>

</html>