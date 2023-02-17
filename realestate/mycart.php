<?php include 'header.php'; 
	
?>

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center border rounded bg-primary my-5">
			<h1>MY CART</h1>
			
		</div>
		<div class="col-sm-8">
			<table class="table table-striped  mt-4">
			    <thead class="text-center">
			        <tr class="success">
			        	<th scope="col">Serial N/o</th>
					    <th scope="col">Property Name</th>
					    <th scope="col">Monthly Charge</th>
					    <th scope="col">Quantity</th>
					    <th></th>

			    	</tr>
			    </thead>
			    <tbody class="text-center">
			    	<?php 
			    		$total=0;

			    		if (isset($_SESSION['cart'])) {
			    			# code...
			    		
				    		foreach ($_SESSION['cart'] as $key => $value) {
				    			$sr=$key+1;
				    			$total=$total+$value['Charge'];
				    			echo"
				    				<tr>
				    					<td>$sr</td>
				    					<td> $value[name]</td>
				    					<td> $value[Charge]</td>
				    					<td><input class='text-center' type='number' value='$value[Quantity]' min='1' max='10'></td>
				    					<td>
				    					<form action='manage_cart.php' method='POST'>
				    					<button name='remove_item' class='btn btn-sm btn-danger'><b>REMOVE</b></button>
				    					<input type='hidden' name='name' value='$value[name]'>

				    					</form>
				    					</td>
				    			";
				    		}
				    	}

			    	 ?>
			    </tbody>
			
		</div>
		<div class="col-sm-6">

			<div class="border bg-light rounded p-4">
				<h4>Total:</h4>
				<h5 class="text-right">$<?php echo $total ?></h5>
				<br>
				<form>	
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
					  <label class="form-check-label" for="flexRadioDefault2">
					    Cash On Delivery
					  </label>
					</div>		
					<br>
					<button class="btn btn-primary btn-block">Make Payment</button>
				</form>
				
			</div>
			
			
		</div>
		
	</div>

	
</div>