<?php 
session_start();
include("includes/connection.php");
include("includes/functions.php");
?>
<?php
    if (isset($_GET['id'])) {
       $_SESSION['product_id'] = $_GET['id'];
       $product_id = $_SESSION['product_id'];
        
    }
 ?>
<?php 
     $product_id = $_SESSION['product_id'];
    if (isset($_POST["edit_product"])) {
        $product_name = mysqli_real_escape_string($connection,$_POST['product_name']);
        $current_location = mysqli_real_escape_string($connection,$_POST['current_location']);
        $product_quantity = mysqli_real_escape_string($connection,$_POST['product_quantity']);
        $product_price = mysqli_real_escape_string($connection,$_POST['product_price']);
        $description = mysqli_real_escape_string($connection,$_POST['description']);
        $negotiable = mysqli_real_escape_string($connection,$_POST['negotiable']);
        $user_id = $_SESSION['id'];
       

            

         $edit_q = "UPDATE products SET product_name='$product_name', current_location='$current_location', product_quantity='$product_quantity', product_price='$product_price', description='$description', negotiable='$negotiable' WHERE id=$product_id"
         or die("Error editing");

         $edit_r = mysqli_query($connection,$edit_q)
         or die("No edit");
         if (!$edit_q) {
             $_SESSION['edit_message'] = 2;
             header("Location: details.php?id=$product_id");
         }else{
                $_SESSION['edit_message'] = 1;
               header("Location: details.php?id=$product_id");
         }

}
?>
<?php include("includes/header2.php");?>
 <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Edit product</li>
                    </ul>

                </div>
                <div class="well">
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Edit Product Details</h1>

                        <p class="text-muted">If you have any questions,
                         please feel free to 
                        <a href="contact.html">contact us</a>.</p>

                        <hr>
                        <?php 
                         $query = "SELECT * FROM products WHERE id = $product_id";

                                $q_result = mysqli_query($connection,$query)
                                or die("Query failed");

                                if(!$query){
                                    echo " The select dint work";
                                }else{

                                while($row = mysqli_fetch_assoc($q_result)){

                                    $id = $row['id'];
                                    $user_email = $_SESSION['email'];
                                    $user_id = $row['user_id'];
                                    $current_location = $row['current_location'];
                                    $negotiable = $row['negotiable'];
                                    $product_quantity = $row['product_quantity'];
                                    $product_price = $row['product_price'];
                                    $pic1 = $row['pic1'];
                                    $product_name = $row['product_name'];
                                    $product_price = $row['product_price'];
                                    $product_description = $row['description'];


                                }
                            }



                        ?>

                        <form action="edit_product.php" method="post" name="register" class="well">
                            <div class="form-group">
                                
                                <label for="fname">Product Name</label>
                                <span class="Error" id="errfname">Please fill this</span>
                                <input type="text" value="<?php echo $product_name;?>"name="product_name" class="form-control" id="name" required>
                            </div>
                            
                             <div class="form-group">
                                <label for="phone">Product Location</label>
                                <span class="Error" id="errcounty">Please fill this</span>
                                <input type="text"  value="<?php echo $current_location;?>"name="current_location" class="form-control" id="location" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Product Quantity</label>
                                <span class="Error" id="errquant">Please fill this</span>                                
                                <input type="number"  value="<?php echo $product_quantity;?>"name="product_quantity" value="1" id="quantity" class="form-control " required>
                            </div>
                             <div class="form-group">
                                <label for="county">Product price</label>
                                <span class="Error" id="product_price">Please fill this</span>                                
                                <input type="number"  value="<?php echo $product_price;?>"name="product_price"  id="price" class="form-control" placeholder="ksh" required>
                            </div>
                             <div class="form-group">
                                <label for="lname">Product Description<i style="color:red">Make sure you fill this</i></label>
                                <span class="Error" id="errlname">Please fill this</span>
                                <textarea class="form-control"  value="<?php echo $product_description;?>"name="description"id="desc" rows="3" ></textarea> 
                            </div>
                                                     
                                 <div class="form-group">
                                
                               <label>Is your product negotiable?</label>                              
                                 <select name="negotiable" class="form-control">
                                    <option name="negotiable">Negotiable</option>
                                    <option name="non-negotiable">Non-negotiable</option>
                                </select>
                                
                            </div>
                            <div class="text-center">
                                <button type="submit" name="edit_product"  class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Edit Product</button>
                            </div>
                        </form>
                    </div>
                </div>


                
                             <!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->

            

            <div class="container">

                <div class="col-md-6" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Horticulter now</a></h4>
                                <p class="author-category">By <a href="#">Kelvin </a> in <a href="">konnectfarm</a>
                                </p>
                                <hr>
                                <p class="intro">"The key to realizing a dream is to focus not on success but significance and then even the small steps and little victory along your path will take on greater meaning."</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Who is who </a></h4>
                                <p class="author-category">By <a href="#">Kelvin</a> in <a href="">konnectfarm</a>
                                </p>
                                <hr>
                                <p class="intro">"The key to realizing a dream is to focus not on success but significance and then even the small steps and little victory along your path will take on greater meaning."</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>

                        </div>

                    </div>
                    <!-- /#blog-homepage -->
                </div>
            </div>
            <!-- /.container -->
                


                         </div>
                          <!-- /.container -->
                        </div>
                          <!-- /#content -->
                        

                    
                       
               


           
        

    <?php include("includes/footer.php"); ?>