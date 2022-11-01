<?php
include('auth.php');
include('header.php'); 
include('config.php');

?>

<?php

$query= "SELECT * FROM category";

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
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($results as $result){ ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $result['cId'] ?></strong></td>
                        <td><?php echo $result['cName'] ?></td>
                        <td>
                        <?php echo $result['cStatus'] ?>
                           
                        </td>
                        <td> <button type="button" class="btn btn-outline-primary">Edit</button> |
                        <a href="deleteCat.php?id=<?php echo $result['cId'];?>">
                        <button type="button" class="btn btn-outline-danger">Delete</button> </td>
                      </a> </td>
                        
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
