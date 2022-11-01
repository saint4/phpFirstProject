<?php include('config.php') ?>

<?php  

$id = $_GET['id'];


$query= "DELETE FROM category WHERE cId='$id'";

$results= mysqli_query($con,$query);

if ($results) {
	  
header("location: category.php");

}else{

	header("location: category.php");
}





?>