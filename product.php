<?php
include('auth.php');
include('header.php'); 
include('config.php');

?>

<?php

$query= "SELECT * FROM products";

$results = mysqli_query($con,$query);


 ?>


<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">


   <a href="addCat.php"><button class="btn  btn-success">Add Category</button></a>


<!-- Hoverable Table rows -->
<div class="card">
                <h5 class="card-header">Category</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Short Description</th>
                        <th>Product Price</th>
                        <th>Product Sale Price</th>
                        <th>Product Category</th>
                        <th>Product Image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($results as $result){ ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $result['pID'] ?></strong></td>
                        
                        <td>
                        <?php echo $result['pName'] ?>
                        </td>
                        <td>
                        <?php echo $result['pDescription'] ?>
                        </td>
                        <td>
                        <?php echo $result['pShortDescription'] ?>
                        </td>
                        <td>
                        <?php echo $result['pPrice'] ?>
                        </td>
                        <td>
                        <?php echo $result['pSalePrice'] ?>
                        </td>
                        <td>
                        <?php echo $result['cat'] ?>
                        </td>
                        <td>
                          <img src="images/<?php echo $result['pImage'] ?>" height="75px" width="80px">
                        </td>
                        <td> <button type="button" class="btn btn-outline-primary">Edit</button> |
                        <a href="deleteprod.php?id=<?php echo $result['pID'];?>">
                        <button type="button" class="btn btn-outline-danger">Delete</button> </td>
                      </a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Hoverable Table rows -->


            </div>
</div>
