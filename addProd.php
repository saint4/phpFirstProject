<?php include "auth.php" ?>
<?php include "header.php" ?>
<?php include "config.php" ?>
<div class=" container">
<?php 

    if(isset($_POST['btnAdd'])){
        $name = $_POST['pName'];
        $decription = $_POST['pdescript'];
        $shortDescp = $_POST['shortdescp'];
        $price = $_POST['price'];
        $salePrice = $_POST['salePrice'];
        $category = $_POST['category'];

        
          $errors= array();
          $file_name = $_FILES['image']['name'];
          $file_size = $_FILES['image']['size'];
          $file_tmp = $_FILES['image']['tmp_name'];
          $file_type = $_FILES['image']['type'];
          $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
          
          $extensions= array("jpeg","jpg","png");
          
          if(in_array($file_ext,$extensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }
          
          if($file_size > 2097152) {
             $errors[]='File size must be excately 2 MB';
          }
          
          if(empty($errors)==true) {
             move_uploaded_file($file_tmp,"images/".$file_name);
             echo "Success";
          }else{
             print_r($errors);
          }
       
    
        $image = $file_name;
        

        $query ="INSERT INTO `products` ( `pName`, `pDescription`,`pShortDescription`,`pImage`,`pPrice`,`pSalePrice`,`cat`) VALUES ( '$name', '$decription','$shortDescp','$image','$price','$salePrice','$category')";
        $result = mysqli_query($con,$query) ;

        if($result){
            $msg = "Product Added Sucessfully";
        }else{
            $msg = "Unable To Add Product";
        }
    }


?>
<div class="content-wrapper">
    
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        
        <?php 
         if(isset($msg)){
            $cond = "Product Added Sucessfully";
            if ($msg == $cond) {
                echo '<div class="alert alert-success" role="alert">Category Added Sucessfully</div>';
            }else{
                echo '<div class="alert alert-danger" role="alert">Unable To Add Category</div>';
            }
          }
      ?>
    <div class="card-body">

            <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mt-2 mb-3">
                        <label for="largeInput" class="form-label">Product Name</label>
                        <input
                          id="largeInput"
                          class="form-control form-control-lg"
                          type="text"
                          name="pName"
                          placeholder="Product Name"
                        />
                    </div>
                      <div class="mt-2 mb-3">
                        <label for="largeInput" class="form-label">PRODUCT DESCRIPTION</label>
                        <input
                          id="largeInput"
                          class="form-control form-control-lg"
                          type="text"
                          name="pdescript"
                          placeholder="Product DESCRIPTION"
                        />
                      </div>
                      <div class="mt-2 mb-3">
                        <label for="largeInput" class="form-label">PRODUCT SHORT DESCRIPTION</label>
                        <input
                          id="largeInput"
                          class="form-control form-control-lg"
                          type="text"
                          name="shortdescp"
                          placeholder="Product SHORT DESCRIPTION"
                        />
                      </div>
                      <div class="mt-2 mb-3">
                        <label for="largeInput" class="form-label">PRODUCT PRICE</label>
                        <input
                          id="largeInput"
                          class="form-control form-control-lg"
                          type="text"
                          name="price"
                          placeholder="Product PRICE"
                        />
                      </div>
                      <div class="mt-2 mb-3">
                        <label for="largeInput" class="form-label">PRODUCT SALE PRICE</label>
                        <input
                          id="largeInput"
                          class="form-control form-control-lg"
                          type="text"
                          name="salePrice"
                          placeholder="Product SALE PRICE"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="defaultSelect" class="form-label">PRODUCT CATEGORY</label>
                        <select id="defaultSelect" class="form-select" name="category">
                        <option>Select Category</option>
                          <?php
                            $queryCat ="Select * from category";
                            $catData = mysqli_query($con,$queryCat);
                            foreach($catData as $cdata){
                          
                          ?>
                          <option value="<?php echo $cdata['cId'] ?>"><?php echo $cdata['cName']?></option>
                        
                             <?php } ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">PRODUCT IMAGE</label>
                        <input class="form-control" type="file" name="image" id="formFileMultiple" multiple />
                      </div>
                      <button type="submit" name="btnAdd" class="btn mt-3 rounded-pill btn-primary">ADD</button>
                    
                      
            </form>
         </div> 
         </div>
    </div>
</div>

</div>

<?php "footer.php" ?>