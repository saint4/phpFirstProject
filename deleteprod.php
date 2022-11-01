<?php include('config.php') ?>

<?php  

$id = $_GET['id'];


$query= "DELETE FROM products WHERE pID='$id'";

$results= mysqli_query($con,$query);

if ($results) {
	  
header("location: product.php");

}else{

	header("location: product.php");
}


?>