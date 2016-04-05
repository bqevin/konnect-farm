<?php 
session_start();
include("includes/connection.php");

if (isset($_SESSION['email']) && isset($_SESSION['id'])) {
        header("Location:mywishlist.php");
    }
?>
<?php 
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = md5($_POST['password']);

        $login_q = "SELECT * FROM users WHERE email = '$email'";

        $result1 = mysqli_query($connection,$login_q)
        or die("Could not execute the select shiet");

        $count1 = mysqli_num_rows($result1);

        if(!$count1 > 0){
              $_SESSION['loginerror'] = 1;
                header("Location : login.php");
        }else{

            $confirm_pass = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

            $result2 = mysqli_query($connection,$confirm_pass)
            or die("Could not confirm password");
            $count2 = mysqli_num_rows($result2);
            if($count2 == 1){

                while ($fetch_user = mysqli_fetch_assoc($result2)) {
                    $id = $fetch_user['id'];
                    $email =$fetch_user['email'];
                    $fname = $fetch_user['fname'];
                    $lname = $fetch_user['lname'];
                }
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $fname;
                $_SESSION['lname'] = $lname;

                header("Location: mywishlist.php");
                
                
            }else{
                $_SESSION['loginerror'] = 1;
                header("Location : login.php");
                
            }
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
                        <li> Login</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>
                        <?php 
                            if (isset($_SESSION['newu_fname'])) {
                                ?>
                                    <div class="well">
                                        <p style="color:green"><?php echo $_SESSION['newu_fname']; ?>, your profile was created.Please log in</p>
                                    </div>
                                <?php
                            }
                            unset($_SESSION['newu_fname']);

                        ?>

                        <p class="lead">Have you already signed up?</p>
                        <p>Login to sell  and buy amazing products!</p>
                        <p class="text-muted">If you have any questions,
                         please feel free to 
                        <a href="contact.html">contact us</a>.</p>

                        <hr>

                          <form action="login.php" method="post">
                           <?php 
                              //check for any errors
                               if(isset($_SESSION["loginerror"]))     
                                {
                                    if ($_SESSION["loginerror"] == 1) {
                                        
                                    
                                       ?>
                                         <div class="alert alert-danger">
                                             
                                             <p><i class="fa fa-lg fa-warning"></i>&nbsp;Your Email/password did not match</p>
                                             </div>
                                             <?php
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="row form-inline">
                            <div class="col-md-6 col-sm-12 ">
                            
                                <button type="login" name="login" class="btn btn-primary">
                                <i class="fa fa-sign-in"></i> Log in</button>
                            
                            </div>

                            <div class="col-md-6 col-sm-12 ">
                            
                            <a href="password_recovery.html">
                                <div class="btn btn-primary">
                                <i class="fa fa-sign-in"></i> Forgot Password
                                </div>
                            </a>
                                                       
                            </div>
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