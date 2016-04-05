<?php
session_start();
    include("includes/connection.php");
    
    if (empty($_SESSION['email']) && empty($_SESSION['id'])) {
        header("Location:login.php");
    }
    
 ?>
<?php include("includes/header2.php") ?>
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
                                    
                                     <a href=""><i class="fa fa-heart"></i> My wishlist</a>
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
                        <li>Products</li>
                    </ul>

                    <div class="box">
                    <?php 
                        if (isset($_SESSION['product_success'])) {
                            if ($_SESSION['product_success'] == 1) {
                                ?>
                                  <div class="well">
                                      <p style="color:blue">Your product was successfully uploaded.</p>
                                  </div>
                                <?php
                            }elseif ($_SESSION['product_success'] == 2) {
                                ?>
                                  <div class="well">
                                      <p style="color:red">Your product was not uploaded. Please try again</p>
                                  </div>
                                <?php
                            }
                            # code...
                        }
                        unset($_SESSION['product_success']);
                    ?>
            
                        <h1>My wishlist</h1>
                        <p class="lead">Variety of products on sale.</p>
                        <ul class="list-inline">
                        <li><i class="fa fa-user-md">
                        <a href="product.php">Upload a Product</i></a></li>
                        <li><i class="fa fa-user-md"><a href="myproducts.php"></i>View my Products</a></li>
                         </ul>
                    </div>
                    <div class="row products">
                         <?php 
                            $num_rec_per_page=12;

                            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
                            $start_from = ($page-1) * $num_rec_per_page; 
                            $sql = "SELECT * FROM products ORDER BY id DESC LIMIT  $start_from, $num_rec_per_page"; 
                            $rs_result = mysqli_query ($connection,$sql); //run the query
                            ?> 
                            <?php 
                            while ($row = mysqli_fetch_assoc($rs_result)) { 

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
                                }; 
                                ?> 
                    <?php 
                            $sql = "SELECT * FROM products"; 
                            $rs_result = mysqli_query($connection,$sql); //run the query
                            $total_records = mysqli_num_rows($rs_result);  //count number of records
                            $total_pages = ceil($total_records / $num_rec_per_page); 
                            ?>
                            <div class="col-md-12">
                            <div class="controls col-md-2">

                            <a href='mywishlist.php?page=1'><button class="btn btn-info">Previous</button></a>
                            </div>
                             <?php
                            
                            for ($i=1; $i<=$total_pages; $i++) { 
                                ?>
                            <div class="controls col-md-2">

                            <a href='mywishlist.php?page=<?php echo $i;?>'><button class="btn btn-info"><?php echo $i;?></button></a>
                            </div>
                            <?php
                            }; 
                            ?>
                            <div class="controls col-md-2">

                            <a href='mywishlist.php?page=<?php echo $total_pages;?>'
                            ><button class="btn btn-info">Last Page</button></a>
                            </div>
                            </div>
                            <?php
                            ?>
                        
                        
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


      <?php include("includes/footer.php"); ?>
</html>