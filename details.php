<?php 
session_start();
include("includes/connection.php"); 
?>
<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];   
    }else{
        if(isset($_SESSION['email'])){
            header("Location:mywishlist.php");
        }else{
            header("Location:index.php");
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
                        <li><a href="#">products</a>
                        </li>
                        <li><a href="#">Details</a>
                        </li>                        
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu class names: .visible-sm-block , hidden-sm hidden-xs ">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="mywishlist.php">Cereals <span class="badge pull-right">42</span></a>
                                    <ul>
                                        <li><a href="mywishlist.php">Maize</a>
                                        </li>
                                        <li><a href="mywishlist.php">Wheat</a>
                                        </li>
                                        <li><a href="mywishlist.php">Sorghum</a>
                                        </li>
                                        <li><a href="mywishlist.php">Millet</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="active">
                                    <a href="mywishlist.php">Horticulture  <span class="badge pull-right">123</span></a>
                                    <ul>
                                        <li><a href="mywishlist.php">Pyrethrum</a>
                                        </li>
                                        <li><a href="mywishlist.php">Sunflower</a>
                                        </li>
                                        <li><a href="mywishlist.php">Flowers</a>
                                        </li>
                                        <li><a href="mywishlist.php">olive oil</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="mywishlist.php">Fruits  <span class="badge pull-right">11</span></a>
                                    <ul>
                                        <li><a href="mywishlist.php">Apples</a>
                                        </li>
                                        <li><a href="mywishlist.php">Oranges</a>
                                        </li>
                                        <li><a href="mywishlist.php">Mangoes</a>
                                        </li>
                                        <li><a href="mywishlist.php">pineapples</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>

                        </div>
                    </div>

                   

                    <!-- *** MENUS AND FILTERS END *** -->

                    
                </div>

                <div class="col-md-9">
                <?php 
                        if (isset($_SESSION['edit_message'])) {
                            if ($_SESSION['edit_message'] == 1) {
                                ?>
                                  <div class="alert alert-info">
                                      <p style="color:blue"><i class="fa fa-lg fa-info"></i> &nbsp;Edit succesfull.</p>
                                  </div>
                                <?php
                            }elseif ($_SESSION['edit_message'] == 2) {
                                ?>
                                  <div class="alert alert-info">
                                      <p style="color:red"><i class="fa fa-lg fa-warning"></i> &nbsp;Edit failed. Please try again</p>
                                  </div>
                                <?php
                            }
                            # code...
                        }
                        unset($_SESSION['edit_message']);
                    ?>
                    <?php 

                                $query = "SELECT * FROM products WHERE id = $id";

                                $q_result = mysqli_query($connection,$query)
                                or die("Query failed");

                                if(!$query){
                                    echo " The select dint work";
                                }else{

                                while($row = mysqli_fetch_assoc($q_result)){

                                    $id = $row['id'];
                                    $user_id = $row['user_id'];
                                    $current_location = $row['current_location'];
                                    $negotiable = $row['negotiable'];
                                    $product_quantity = $row['product_quantity'];
                                    $product_price = $row['product_price'];
                                    $pic1 = $row['pic1'];
                                    $product_name = $row['product_name'];
                                    $product_price = $row['product_price'];
                                    $product_unit = $row['product_unit'];
                                    $product_description = $row['description'];

                                ?>
                                <div class="row" id="productMain">
                                    <div class="col-sm-6">
                                    <div id="mainImage">
                                        <img src="<?php echo $pic1;?>" alt="" class="thumbnail" style="width: 100%; max-width: 500px; height: 300px;"class="img-responsive">
                                         </div>

                            

                        </div>
                        <div class="col-sm-6">
                            <div class="box">


                                <div class="product-info simpleCart_shelfItem">
                                <?php 
                                if (isset($_SESSION['id'])) {
                                    if ($_SESSION['id'] == $user_id) {
                                    ?>                        
                                        <div class="btn btn-success"><a style="color:black" href="edit_product.php?id=<?php echo $id;?>">Edit product</a></div>               
                                        <div class="btn btn-danger"><a  style="color:black"href="delete_product.php?id=<?php echo $id;?>">Delete product</a></div>
                                <?php
                                    }
                                 }
                                ?>
                                <h4><?php echo $product_name; ?></h4>

                                  
                                <span class="item_price">Ksh <?php echo $product_price." per ".$product_unit; ?></span>                                
                                <input type="number" value="1" class="item_quantity" value="1" />
                                <input type="button" class="item_add items" value="Add to cart">
                        </div>                                                  
                            <div class="clearfix"> </div>


                            </div>                         
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4><u>Product details</u></h4>
                            <p><b>Product Name :</b><?php echo $product_name; ?></p>
                            <p><b>Current Location :</b> <?php echo $current_location; ?></p>
                            <p><b>Quantity :</b> <?php echo $product_quantity; ?></p>
                            <p><b>Status :</b> <?php echo $negotiable; ?></p>
                            
                            <blockquote>
                                <p><em><?php echo $product_description; ?></em>

                                </p>
                            </blockquote>
                            <h4><u>contacts</u> </h4>
                            <ul>
                                <?php
                                    $user_q ="SELECT * FROM users WHERE id = '$user_id'";

                                    $user_r = mysqli_query($connection,$user_q);

                                    if (!$user_r) {
                                        echo "The user Who posted this product could not be found";
                                    }else{
                                        $phone = "";
                                        $county = "";
                                        while($user = mysqli_fetch_assoc($user_r)){
                                            $phone = $user['p_no'];
                                            $county = $user['county'];
                                        }
                                        
                                        echo "<li> (+254)".$phone."</li>";
                                        echo "<li>".$county."</li>";
                                        
                                    }
                                 ?>
                            </ul>

                          

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse">
                                    <i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse">
                                    <i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse">
                                    <i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse">
                                    <i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>
                        <?php    
                        }
                    }
                    ?>

                    <div class="row same-height-row">
                        <div class="col-md-12 col-sm-12">
                            <div class="box ">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>
                        <?php 
                         $query = "SELECT * FROM products ORDER BY id ASC LIMIT 4";

                                $q_result = mysqli_query($connection,$query)
                                or die("Query failed");

                                if(!$query){
                                    echo " The select dint work";
                                }else{

                                while($row = mysqli_fetch_assoc($q_result)){

                                    $id = $row['id'];
                                    $user_id = $row['user_id'];
                                    $current_location = $row['current_location'];
                                    $negotiable = $row['negotiable'];
                                    $product_quantity = $row['product_quantity'];
                                    $product_price = $row['product_price'];
                                    $pic1 = $row['pic1'];
                                    $product_name = $row['product_name'];
                                    $product_price = $row['product_price'];
                                    $product_description = $row['description'];


                            
                            



                        ?>
                         <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="details.php?id=<?php echo $id; ?>">
                                                <img src="<?php echo $pic1;?>" class="thumbnail" style="width: 100%; max-width: 300px; height: 200px;"alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="details.php?id=<?php echo $id; ?>">
                                                <img src="<?php echo $pic1;?>" class="thumbnail" style="width: 100%; max-width: 300px; height: 200px;"alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="details.php?id=<?php echo $id; ?>" class="invisible">
                                    <img src="<?php echo $pic1;?>" class="thumbnail" style="width: 100%; max-width: 300px; height: 200px;"alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="details.php?id=<?php echo $id; ?>"><?php echo $product_name;?></a></h3>
                                    <p class="price">Ksh <?php echo $product_price;?></p>
                                    <p class="buttons">
                                        <a href="details.php?id=<?php echo $id; ?>" class="btn btn-default">View detail</a>
                                        <a href="""" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php
                            }
                        }   
                        ?>


                        
                    </div>

                 
                     </div>

                    </div>

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

     <?php include("includes/footer.php"); ?>