<?php include 'header.php'; ?>

<?php

	$mysqli=new mysqli('localhost','root','','property');
	if($mysqli->connect_error){
		printf("Cannot connect to the database %s\n",$mysqli->connect_error);
		exit();
	}
if(isset($_GET['posts'])) {
	$id=$_GET['posts'];
	$query2="SELECT * FROM property WHERE id='$id'";
	$readd=$mysqli->query($query2);
		
	}

 ?>
 <style type="text/css">
 	.room img{
 		width: 50px;
 		height: 50px;

 	}
 	

 </style>
<div class="container">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th scope="col">Address</th>
				<th scope="col">Access</th>
				<th scope="col">Floor Space</th>
				<th scope="col">Utility</th>
				<th scope="col">Description</th>
				<th scope="col">Rooms</th>
			</tr>
		</thead>
		<tbody>
		<?php while ($row=$readd->fetch_assoc()) {
			# code...
		 ?>

			<tr>
				<td><?php echo $row['address'] ?></td>
				<td><?php echo $row['access'] ?></td>
				<td><?php echo $row['floor'] ?></td>
				<td><?php echo $row['utility'] ?></td>
				<td><?php echo $row['description'] ?></td>
				<td class="room">

				<?php $image_name="SELECT * FROM property as p join details as d
				 			on p.id =d.proid WHERE d.proid =".$row['id'];
				 			$read1=$mysqli->query($image_name);

				 			foreach ($read1 as $value) { ?>
				 				<img src="uploads/<?php echo $value['images']; ?>"/>
				 				
				 			<?php }  ?>
				 			



				

				 
					
				</td>
			</tr>

<?php
 } ?>
			
		</tbody>	
		

  				
  		

		
	</table>

</div>

 	
 </div>

<?php include 'footer.php'; ?>