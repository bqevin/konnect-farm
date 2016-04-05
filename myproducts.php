<?php
    session_start();
    include("includes/connection.php");
    include("includes/functions.php");
    page_restrict();
    
 ?>
 <?php include("includes/header2.php"); ?>

      <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li>My wishlist</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    
                                     <a href="mywishlist.php"><i class="fa fa-heart"></i> My wishlist</a>
                                </li>
                                <li>
                                    <a href="me.php"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="product.php"><i class="fa fa-user"></i> Add new Product</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="wishlist">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <?php 
                         if (isset($_SESSION["delete_success"])) {
                             if ($_SESSION["delete_success"] == 1) {
                                 ?>
                                  <div class="alert alert-info">
                                      <p style="color:blue"><i class="fa fa-lg fa-info"></i> &nbsp; Product deleted Succesfully.</p>
                                  </div>
                                 <?php
                             }elseif ($_SESSION["delete_success"] == 2) {
                                 ?>
                                   <div class="alert alert-warning">
                                      <p style="color:blue"><i class="fa fa-lg fa-warning"></i> &nbsp; Error.Product not deleted please try again</p>
                                  </div>
                                 <?php
                             }
                             unset($_SESSION["delete_success"]);
                         }
                        ?>

                        <li>Products</li>
                    </ul>
                        <?php 
                        $user_id = $_SESSION['id'];
                        $query = "SELECT * FROM products WHERE user_id=$user_id ORDER BY upload_date DESC";

                        $q_result = mysqli_query($connection,$query)
                        or die("Query failed");

                        $myproducts_count = mysqli_num_rows($q_result);

                        if ($myproducts_count <1) {
                           $noproduct = "You do not have any products at the momment.";
                        }
                        ?>
                        <div class="box">
                    
                 
                        <h1>My Products</h1>
                        <p class="lead">Variety of products you posted.</p>
                        <ul class="list-inline">
                        <li><i class="fa fa-user-md">
                        <a href="product.php">Upload a Product</i></a></li>
                                <?php
                                    if (isset($noproduct)) {
                                        ?>
                                        &nbsp;
                                         <div class="alert alert-info">
                                            
                                                 <p><i class="fa fa-lg fa-info"></i> &nbsp;<?php echo $noproduct; ?><a href="product.php"> Upload a Product</p>
                                            
                                        </div>
                                        <?php
                                    }
                                ?>
                           
                        
                         </ul>
                    </div>
                    <div class="row products">
                        <?php

                        if(!$query){
                            echo " The select dint work";
                        }else{

                        while($row = mysqli_fetch_assoc($q_result)){

                            $id = $row['id'];
                            $current_location = $row['current_location'];
                            $negotiable = $row['negotiable'];
                            $product_quantity = $row['product_quantity'];
                            $product_price = $row['product_price'];
                            $pic1 = $row['pic1'];
                            $product_name = $row['product_name'];
                            $product_price = $row['product_price'];

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
            <!-- /.container -->
        </div>
        <!-- /#content -->
      <?php include("includes/footer.php"); ?>
</html>