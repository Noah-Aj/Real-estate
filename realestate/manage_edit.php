<?php
  session_start()
 # if (empty('$username')){
 #   header("location: login.php");
 #   } 

 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Management Table!</title>
    <style>
      .container{
        background-color: whitesmoke;
        box-shadow: 1px 1px 2px 1px grey;
        padding: 5px 5px 5px 5px;
        width: 100%;
        height: 125%;
        margin-left: 5%;

      }
      .btn {
        width: 15%;
        padding: 10px;
        font-size: 15px;
        color: white;
        background: #5F9EA0;
        border: none;
        border-radius: 5px;
        margin-left: 15%;
      }
      .txt{
        width: 30%;
        border: 1px solid brow;
        border-radius: 05px;
        margin: 10px 0px 15px 0px;
        margin-left: 2%;
      }
      .txt1{
        width: 30%;
        border: 1px solid brow;
        border-radius: 05px;
        margin: 10px 0px 15px 0px;
        margin-left: 7%;
      }
      .txt2{
        width: 30%;
        border: 1px solid brow;
        border-radius: 05px;
        margin: 10px 0px 15px 0px;
        margin-left: 8%;
      }
      .txt3{
        width: 30%;
        border: 1px solid brow;
        border-radius: 05px;
        margin: 10px 0px 15px 0px;
        margin-left: 4%;
      }
      .txt4{
        width: 30%;
        border: 1px solid brow;
        border-radius: 05px;
        margin: 10px 0px 15px 0px;
        margin-left: 8%;
      }
      .txt5{
        width: 30%;
        border: 1px solid brow;
        border-radius: 05px;
        margin: 10px 0px 15px 0px;
        margin-left: 4%;
      }
      .txt6{
        width: 30%;
        border: 1px solid brow;
        border-radius: 05px;
        margin: 10px 0px 15px 0px;
        margin-left: 8%;
      }
      .txt7{
        width: 30%;
        border: 1px solid brow;
        border-radius: 05px;
        margin: 10px 0px 15px 0px;
        margin-left: 1%;
      }
      

    </style>

  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Modules
          </a>
          
        </li>
        </ul>   
      </div>
    </div>
  </nav>
    <?php 
    $id=0;
    $name='';
    $charge='';
    $address='';
    $access='';
    $floor='';
    $utility='';
    $description='';
    $images='';
    $conn=new mysqli('localhost','root','','property') or die(mysqli_error($conn));
    if (isset($_POST['update'])) {
      $name=$_POST['name'];
      $charge=$_POST['charge'];
      $address=$_POST['address'];
      $access=$_POST['access'];
      $floor=$_POST['floor'];
      $utility=$_POST['utility'];
      $description=$_POST['description'];
      $images=$_POST['images'];
      $id=$_POST['id'];
      
      $sql="UPDATE `property` SET `name`='$name',`charge`='$charge',`address`='$address',`access`='$access',`floor`='$floor',`utility`='$utility',`description`='$description',`images`='$images' WHERE `id`='$id'";
      $result=$conn->query($sql);

      if ($result==TRUE) {
        echo "<script>alert(\"Records Updated Successfully\")</script>";
        header("location: manage.php");
        # code...
      }else {
        echo "Error:" . $sql . "<br>" . $conn->error;
      }
  } 

    if (isset($_GET['id'])) {
      $id=$_GET['id'];
      $sql = "SELECT * FROM property WHERE id=$id";
      $result=$conn->query($sql);
      if ($result->num_rows > 0) {

        while ($row=$result->fetch_assoc()) {
          $name=$row['name'];
          $charge=$row['charge'];
          $address=$row['address'];
          $access=$row['access'];
          $floor=$row['floor'];
          $utility=$row['utility'];
          $description=$row['description'];
          $images=$row['images'];
          $id=$row['id'];  
        }
    
  ?>
    <div class="container">
    <h2 class="page-header mt-3"><b>Edit Information<b></h2>
      <hr>
      <form action="manage_edit.php" method="POST">
        <label>*Property Name: </label>
        <input type="text" class="txt" value="<?php echo $name; ?>" name="name">
        <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
        <label>*Monthly Charge: </label>
        <input type="text" class="txt7" value="<?php echo $charge; ?>" name="charge">
        <br>
        <label>*Address: </label>
        <input type="text" class="txt1" value="<?php echo $address; ?>" name="address">
        <br>
        <label>*Access: </label>
        <input type="text" class="txt2" value="<?php echo $access; ?>" name="access">
        <br>
        <label>*Floor Space: </label>
        <input type="text" class="txt3" value="<?php echo $floor; ?>" name="floor">
        <br>
        <label>*Utility: </label>
        <input type="text" class="txt4" value="<?php echo $utility; ?>" name="utility">
        <br>
        <label>*Description: </label>
        <input type="text" class="txt5" value="<?php echo $description; ?>" name="description">
        <br>
        <label>*Image: </label>
        <input type="text" class="txt6" value="<?php echo $images; ?>" name="images">
        <br>
        <input type="submit" class="btn" name="update" value="Update Record">
      
      </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>
  <?php
     } else {
          header("location: manage.php");
        }

      }   

   ?>
