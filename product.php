<?php 
session_start();
include("includes/connection.php");
include("includes/functions.php");
?>
<?php
    page_restrict();
 ?>
<?php 
    $my_id = "";
    if (isset($_POST["create_new"])) {
        
        $product_name = mysqli_real_escape_string($connection,$_POST['product_name']);
        $current_location = mysqli_real_escape_string($connection,$_POST['current_location']);
        $product_quantity = mysqli_real_escape_string($connection,$_POST['product_quantity']);
        $product_price = mysqli_real_escape_string($connection,$_POST['product_price']);
        $description = mysqli_real_escape_string($connection,$_POST['description']);
        $product_unit = mysqli_real_escape_string($connection,$_POST['product_unit']);
        $negotiable = mysqli_real_escape_string($connection,$_POST['negotiable']);
        $user_id = $_SESSION['id'];
       

            

            $create_product_query = "INSERT INTO products(user_id,product_name,product_price,product_quantity,product_unit,current_location,description,negotiable) VALUES('$user_id','$product_name','$product_price','$product_quantity','$product_unit','$current_location','$description','$negotiable')"
        or die("Could not create the new product");

        $create_r = mysqli_query($connection,$create_product_query)
        or die("Couldnt");

        if (!$create_r) {
            header("Location: product.php?message = 2");
        }else{
            $get_id = "SELECT * FROM products WHERE product_name = '$product_name' AND description = '$description' AND user_id = '$user_id'"
            or die("Could not query");
            $get_id_r = mysqli_query($connection,$get_id)
            or die("Could not get the result");
            while ($get = mysqli_fetch_assoc($get_id_r)) {
                $my_id = $get['id'];
            }
            $_SESSION['product_id'] = $my_id;
            header("Location:complete_product_profile.php?message=1");
        }

}
?>
<?php include("includes/header2.php"); ?>
 <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li> product</li>
                    </ul>

                </div>
                <div class="well">
                    <?php 
                        $message = "";
                        if (isset($_GET['message'])) {
                            $message = $_GET['message'];
                            if ($message == 2) {
                                $message = "Your products photo was not uploaded";
                            }
                        }

                    ?>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Product Details</h1>

                        <p class="lead">Is your Product on sell?</p>
                        <p>upload your products to sell them!</p>
                        <p class="text-muted">If you have any questions,
                         please feel free to 
                        <a href="contact.html">contact us</a>.</p>

                        <hr>

                        <form action="product.php" method="post" name="register" class="well">
                            <div class="form-group">
                                <h2><?php echo $message; ?></h2>
                                <label for="fname">Product Name</label>
                                <span class="Error" id="errfname">Please fill this</span>
                                <input type="text" name="product_name" class="form-control" id="name" required>
                            </div>
                            
                             <div class="form-group">
                                <label for="phone">Product Location</label>
                                <span class="Error" id="errcounty">Please fill this</span>
                                <input type="text" name="current_location" class="form-control" id="location" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Product Quantity</label>
                                <span class="Error" id="errquant">Please fill this</span>                                
                                <input type="number" name="product_quantity" value="1" id="quantity" class="form-control " required>
                            </div>
                              <div class="form-group col-md-6">
                                <label for="product_unit">Product unit(kgs,ksh)</label>
                                <span class="Error" id="errquant">Please fill this</span>                                
                                <input type="text" name="product_unit"  id="product_unit" class="form-control " required>
                            </div>
                             <div class="form-group">
                                <label for="county">Product price</label>
                                <span class="Error" id="product_price">Please fill this</span>                                
                                <input type="number" name="product_price"  id="price" class="form-control" placeholder="ksh" required>
                            </div>
                             <div class="form-group">
                                <label for="lname">Product Description</label>
                                <span class="Error" id="errlname">Please fill this</span>
                                <textarea class="form-control" name="description"id="desc" rows="3" required></textarea> 
                            </div>
                            <!--<div class="form-group">
                                <label for="inputfile">Product Picture</label>                            
                                <input type="file"  name="uploadedimage" id="inputfile" required>
                            </div> -->                           
                                 <div class="form-group">
                                <label>Is your product negotiable?</label>                           
                                <select name="negotiable" class="form-control">
                                    <option name="negotiable">Negotiable</option>
                                    <option name="non-negotiable">Non-negotiable</option>
                                </select>
                              
                            </div>
                            <div class="text-center">
                                <button type="submit" name="create_new"  class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Upload Product</button>
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