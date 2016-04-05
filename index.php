<?php 
session_start();
include("includes/connection.php");
include("includes/header2.php"); 

?>


    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                     <div class="item">
                            <img class="img-responsive" src="img/wear.png" alt="">
                        </div>                         
                        <div class="item">
                            <img src="img/slide1-img.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/slide2-img.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/slide3-img.jpg" alt="">
                        </div>                                     
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

         

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot this week</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <?php 
                    $num_rec_per_page=8;

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
                                                                    <img src="<?php echo $pic1; ?>" alt="" class="thumbnail" style="width: 100%; max-width: 300px; height: 200px;"alt="" class="img-responsive">
                                                                </a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="details.php?id=<?php echo $id; ?>">
                                                                    <img src="<?php echo $pic1; ?>" alt="" class="thumbnail" style="width: 100%; max-width: 300px; height: 200px;"alt="" class="img-responsive">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="detail.html" class="invisible">
                                                        <img src="<?php echo $pic1; ?>" alt="" class="thumbnail" style="width: 100%; max-width: 300px; height: 200px;"alt="" class="img-responsive">
                                                    </a>
                                                    <div class="text">
                                                        <h3><a href="details.php?id=<?php echo $id; ?>"><?php echo $product_name;  ?></a></h3>
                                                        <p class="price">ksh <?php echo $product_price; ?></p>
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
                            <div class="controls col-md-1">

                            <a href='index.php?page=1'><button class="btn btn-info">Previous</button></a>
                            </div>
                             <?php
                            
                            for ($i=1; $i<=$total_pages; $i++) { 
                                ?>
                            <div class="controls col-md-1">

                            <a href='index.php?page=<?php echo $i;?>'><button class="btn btn-info"><?php echo $i;?></button></a>
                            </div>
                            <?php
                            }; 
                            ?>
                            <div class="controls col-md-1">

                            <a href='index.php?page=<?php echo $total_pages;?>'
                            ><button class="btn btn-info">Last Page</button></a>
                            </div>
                            </div>
                            <?php
                            ?>

                   
                    </div>
                    </div>


            <!-- *** HOT END *** -->

            <!-- *** GET ADVICE ***
 _________________________________________________________ -->
            <div class="container" >
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Get Expert advice</h3>
                        <p class="lead">Get expert advice on how to utilise  land and make more productive </p>
                        <div id="get-inspired" class="owl-carousel owl-theme">

                            <div class="item">
                                <a href="#">
                                    <img src="img/wear.png" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>

                            <div class="item">
                                <a href="#">
                                    <img src="img/24.png" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET ADVICE END *** -->

            <!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->

            <div class="box text-center" >
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">From our catalogue</h3>
                        <img src="img/plain.jpg" alt="Get inspired" class="img-responsive">

                        <p class="lead">What's new in the world of agriculture? <a href="blog.html">Check our blog!</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-12">

                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="index.php">Horticulter now</a></h4>
                                <p class="author-category">By <a href="#">Kelvin </a> in <a href="">konnectfarm</a>
                                </p>
                                <hr>
                                <p class="intro">"The key to realizing a dream is to focus not on success but significance and then even the small steps and little victory along your path will take on greater meaning."</p>
                                <p class="read-more"><a href="index.php" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="index.php">Who is who </a></h4>
                                <p class="author-category">By <a href="#">Kelvin</a> in <a href="">konnectfarm</a>
                                </p>
                                <hr>
                                <p class="intro">"The key to realizing a dream is to focus not on success but significance and then even the small steps and little victory along your path will take on greater meaning."</p>
                                <p class="read-more"><a href="index.php" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>

                        </div>

                    </div>
                    <!-- /#blog-homepage -->
                </div>
            </div>
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->

  <?php include("includes/footer.php"); ?>