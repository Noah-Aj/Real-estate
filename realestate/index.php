<?php include 'header.php'; ?>
<?php


	$mysqli=new mysqli('localhost','root','','property');
	if($mysqli->connect_error){
		printf("Cannot connect to the database %s\n",$mysqli->connect_error);
		exit();
	}

	$query="SELECT * from property";
	$read=$mysqli->query($query);





 ?>
<div class="container-fluid">
	<div class="banner">
		<img src="images/banner.jpg">
	</div>
</div>
<div class="container">
	<h2><b>Property List</b></h2>
	<hr>
  <form action="manage_cart.php" method="POST">
  	<table class="table table-striped table-hover mt-4">
      <thead>
        <tr class="success">
          <th scope="col">Property Name</th>
          <th scope="col">Monthly Charge</th>
          <th scope="col">Address</th>
          <th scope="col">View</th>
          <th scope="col">Details</th>
        </tr>
      </thead>
      <tbody>
        
        <?php while ($row=$read->fetch_assoc()) { ?>

        	<tr class="success">
        		<td><?php echo $row['name']; ?></td>
        		<td><?php echo $row['charge']; ?></td>
        		<td><?php echo $row['address']; ?></td>
        		<td><img src="uploads/<?php echo $row['images']; ?>" </td>
        		<td><a class="btn btn-primary" href="single.php?posts=<?php echo $row['id']; ?>">Details</a>
              <button type="submit" name="add_to_cart" class="btn btn-info">Add To Cart</button>
              <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
              <input type="hidden" name="charge" value="<?php echo $row['charge']; ?>">

            </td>
        		
        	</tr>
        <?php } ?>

         

      </tbody>
    </table>
</form>
	
</div>


<?php include 'footer.php'; ?>
