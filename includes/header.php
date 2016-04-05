<?php 
session_start();
?>
<!DOCTYPE php>
<php lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="konnectfarm ">
    <meta name="author" content="technest kenya">
    <meta name="keywords" content="">

    <title>
        Konnect Farm
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/validation.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

   <!-- <link rel="shortcut icon" href="favicon.png">-->
      <!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>
    <script type='text/javascript'src="js/jquery-1.11.1.min.js">
    </script>
    <script src="js/simpleCart.min.js"> </script>
     <script type="text/javascript">  
      
     </script>



</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <!--<div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a> 
                 <a href="#">Get flat 35% off on orders over $50!</a>
            </div>-->
            <div class="col-md-12 pull-left" data-animate="fadeInDown">
                <ul class="menu"> 

                <?php 
                    if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
                        ?>
                        <div style="color:#f44336">
                            <i class="fa fa-power-off"><a href="logout.php">logout</a></i>
                          </div>
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                        </li>
                        <li>
                            <a href="register.php">Register</a>
                        </li>                   
                    
                        <?php
                    }
                ?>
                    
                    
                </ul>
            </div>
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary" name="login">
                                <i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>
        </div>
       

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="mywishlist.php" data-animate-hover="bounce">
                    <img src="img/logo.png" alt="konectfarm logo" class="hidden-xs">
                    <img src="img/logo.png" alt="konnectfarm logo" class="visible-xs">
                    <span class="sr-only">Konnectfarm - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.php">
                        <i class="fa fa-shopping-cart"></i>  
                        <span class="hidden-xs">3 items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Produce <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Cereals</h5>
                                            <ul>
                                                <li><a href="mywishlist.php">maize</a>
                                                </li>
                                                <li><a href="mywishlist.php">wheat</a>
                                                </li>
                                                <li><a href="mywishlist.php">sorghum</a>
                                                </li>
                                                <li><a href="mywishlist.php">millet</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Horticultural</h5>
                                            <ul>
                                                <li><a href="mywishlist.php">olive oil</a>
                                                </li>
                                                <li><a href="mywishlist.php">pyrethrum</a>
                                                </li>
                                                <li><a href="mywishlist.php">sunflower</a>
                                                </li>
                                                <li><a href="mywishlist.php">Flowers</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Fruits</h5>
                                            <ul>
                                                <li><a href="mywishlist.php">apples</a>
                                                </li>
                                                <li><a href="mywishlist.php">oranges</a>
                                                </li>
                                                <li><a href="mywishlist.php">mangoes</a>
                                                </li>
                                                <li><a href="mywishlist.php">pineapples</a>
                                                </li>
                                           </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Livestock</h5>
                                            <ul>
                                                <li><a href="mywishlist.php">Catlle</a>
                                                </li>
                                                <li><a href="mywishlist.php">Poultry</a>
                                                </li>
                                                <li><a href="mywishlist.php">Sheep</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Suppliers
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                  <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Cereals</h5>
                                            <ul>
                                                <li><a href="mywishlist.php">maize</a>
                                                </li>
                                                <li><a href="mywishlist.php">wheat</a>
                                                </li>
                                                <li><a href="mywishlist.php">sorghum</a>
                                                </li>
                                                <li><a href="mywishlist.php">millet</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Horticultural</h5>
                                            <ul>
                                                <li><a href="mywishlist.php">olive oil</a>
                                                </li>
                                                <li><a href="mywishlist.php">pyrethrum</a>
                                                </li>
                                                <li><a href="mywishlist.php">sunflower</a>
                                                </li>
                                                <li><a href="mywishlist.php">Flowers</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Fruits</h5>
                                            <ul>
                                                <li><a href="mywishlist.php">apples</a>
                                                </li>
                                                <li><a href="mywishlist.php">oranges</a>
                                                </li>
                                                <li><a href="mywishlist.php">mangoes</a>
                                                </li>
                                                <li><a href="mywishlist.php">pineapples</a>
                                                </li>
                                           </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Livestock</h5>
                                            <ul>
                                                <li><a href="mywishlist.php">Catlle</a>
                                                </li>
                                                <li><a href="mywishlist.php">Poultry</a>
                                                </li>
                                                <li><a href="mywishlist.php">Sheep</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Transporters<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Shop</h5>
                                            <ul>
                                                <li><a href="mywishlist.php">Homepage</a>
                                                </li>
                                                <li><a href="mywishlist.php">Category</a>
                                                </li>
                                                <li><a href="details.php">Product detail</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>User</h5>
                                            <ul>
                                                <li><a href="register.php">Register / login</a>
                                                </li>
                                                <li><a href="mywishlist.php">Orders history</a>
                                                </li>
                                                <li><a href="mywishlist.php">Wishlist</a>
                                                </li>
                                                <li><a href="me.php">Customer account / change password</a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <h5>Pages</h5>
                                            <ul>
                                                <li><a href="">FAQ</a>
                                                </li>
                                                <li><a href="index.php">Text page</a>
                                                </li>
                                                <li><a href="">Contact</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                <div class="clearfix"> </div>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

            <button type="submit" class="btn btn-primary">
               <i class="fa fa-search"></i>
            </button>

            </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->