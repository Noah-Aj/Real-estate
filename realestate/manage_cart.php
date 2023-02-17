<?php 
session_start();
#session_destroy();

	if ($_SERVER["REQUEST_METHOD"]=="POST") {

		if (isset($_POST['add_to_cart'])) {

			if (isset($_SESSION['cart'])) {
				$myitems=array_column($_SESSION['cart'], 'name');
				if (in_array($_POST['name'], $myitems)) {
					echo "<script>alert('Item Already Added');
					window.location.href='index.php';
					</script>";

				}


				else
				{
					$count=count($_SESSION['cart']);
					$_SESSION['cart'][$count]=array('name' =>$_POST['name'],'Charge'=>$_POST['charge'],'Quantity'=>1);
					echo "<script>alert('Item Already Added');
						window.location.href='index.php';
						</script>";

				}	
			
			}
			else 
			{
				$_SESSION['cart'][0]= array('name' =>$_POST['name'],'Charge'=>$_POST['charge'],'Quantity'=>1);
				echo "<script>alert('Item Added');
					window.location.href='index.php';
					</script>";			
			}
			
		}
		if (isset($_POST['remove_item'])) {
			
			foreach ($_SESSION['cart'] as $key =>$value) {
				if($value['name']==$_POST['name'])
				{
					unset($_SESSION['cart'][$key]);
					$_SESSION['cart']=array_values($_SESSION['cart']);
					echo "<script>alert('Item Removed');
					window.location.href='mycart.php';
					</script>";	
				}
			}
		}
		
	}


 ?>