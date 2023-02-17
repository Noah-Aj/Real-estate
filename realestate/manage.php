<?php
  session_start();
  #if (empty('$username')){
   # header("location: login.php");
    #} 
  $conn=new mysqli('localhost','root','','property') or die(mysqli_error($conn)); 
  $id=0;
  if (isset($_GET['delete'])){
  // store the id
  $id = $_GET['delete'];

  $conn->query("DELETE FROM property WHERE id=$id") or die($conn->error());
  echo "<script>alert(\"Record Deleted\")</script>";
  // rediect page
  header("location: manage.php");
}


 ?>

 <?php 

      $conn=mysqli_connect('localhost','root','','property');
      if (isset($_GET['page'])) {
        $page=$_GET['page'];

      }else{
        $page=1;
      }


      $num_per_page =02;
      $start_from = ($page-1)*02;
      

      $query="SELECT * FROM property LIMIT $start_from,$num_per_page";
      $result=mysqli_query($conn,$query);
  ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Editing Page</title>
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
    <h1>Properties Listing</h1>
    <hr size="3px" style="color: skyblue">
    <div class="container">
      <?php 
        if (isset($_SESSION['message'])): ?>
          <div class="alert alert-<?=$_SESSION['msg_type']?>">
          <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
           ?>
          </div>
      <?php endif ?>
      <div class="row justify-content-center">
        <table class="table table-bordered table-striped">
          <div class="col-4">
          </div>
          <thead>
            <tr>
              <th>P/Name</th>
              <th>Charge</th>
              <th>Floor</th>
              <th colspan="2" class="text-center">Action</th>
            </tr>
          </thead>
          <?php 
          while ($row = mysqli_fetch_array($result)): {

            ?>
              <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['charge']; ?></td>
              <td><?php echo $row['floor']; ?></td>
              <td>
                <center>
                <a href="manage_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-md">Edit</a>
                <a href="manage.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
              </center>
              </td>
            </tr>
            <?php 
                }

             ?>
           <?php endwhile ?>
        </table>
      </div>
        <?php 
          $pr_query = "SELECT * FROM property";
          $pr_result = mysqli_query($conn, $pr_query);
          $total_record= mysqli_num_rows($pr_result);
          

          $total_page = ceil($total_record/$num_per_page);

          if($page>1){
            echo "<a href='manage.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";

          }

          for($i=1;$i<$total_page;$i++)
          {
            echo "<a href='manage.php?page=".$i."' class='btn btn-primary'>$i</a>";
          }


           if($i>$page){
            echo "<a href='manage.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";

          }


         ?>
        
      </div>

     <?php 
    function pre_r($array) {
      echo '<pre>';
      print_r($array);
      echo '</pre>';
    }


   ?>

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>