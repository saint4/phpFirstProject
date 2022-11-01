<?php include "auth.php" ?>
<?php include "header.php" ?>
<?php include "config.php" ?>
<?php 

    if(isset($_POST['btnAdd'])){
        $name = $_POST['CatName'];
        $status = $_POST['status'];
        

        $query ="INSERT INTO `category` ( `cName`, `cStatus`) VALUES ( '$name', '$status')";
        $result = mysqli_query($con,$query) ;

        if($result){
            $msg = "Category Added Sucessfully";
        }else{
            $msg = "Unable To Add Category";
        }
    }


?>
<div class="content-wrapper">
    
    <div class="container-xxl flex-grow-1 container-p-y card">
        <?php 
         if(isset($msg)){
            $cond = "Category Added Sucessfully";
            if ($msg == $cond) {
                echo '<div class="alert alert-success" role="alert">Category Added Sucessfully</div>';
            }else{
                echo '<div class="alert alert-danger" role="alert">Unable To Add Category</div>';
            }
          }
      ?>
    <div class="card-body">

            <form action="" method="POST">
                    <div class="mt-2 mb-3">
                        <label for="largeInput" class="form-label">Category Name</label>
                        <input
                          id="largeInput"
                          class="form-control form-control-lg"
                          type="text"
                          name="CatName"
                          placeholder="Category Name"
                        />
                    </div>
                      <div class="mt-2 mb-3">
                        <label for="largeInput" class="form-label">Category Status</label>
                        <input
                          id="largeInput"
                          class="form-control form-control-lg"
                          type="text"
                          name="status"
                          placeholder="Status"
                        />
                      </div>
                      <button type="submit" name="btnAdd" class="btn mt-3 rounded-pill btn-primary">ADD</button>
                    
                      
            </form>
         </div> 
    </div>
</div>



<?php "footer.php" ?>