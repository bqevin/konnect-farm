<?php 
session_start();
include("includes/connection.php");
 $message = "";
 ?>
<?php
    if(isset($_POST["submit"])){
        $fname = mysqli_real_escape_string($connection,$_POST["fname"]);
        $lname = mysqli_real_escape_string($connection,$_POST["lname"]);
        $email = mysqli_real_escape_string($connection,$_POST["email"]);
        $p_no = mysqli_real_escape_string($connection,$_POST["p_no"]);
        $password = mysqli_real_escape_string($connection,md5($_POST["password"]));
        $county = mysqli_real_escape_string($connection,$_POST["county"]);
        
        $e_validate = "SELECT email FROM users WHERE email ='$email'"
        or die("Could notcollect the validation emails.");

        $e_validate_r = mysqli_query($connection,$e_validate)
        or die("Dint happen");

        $validate_count = mysqli_num_rows($e_validate_r);
        if($validate_count > 0){
            header("Location:register.php?message=1");
        }else{

        $reg_query = "INSERT INTO users(fname,lname,email,p_no,password,county) 
        VALUES('$fname','$lname','$email','$p_no','$password','$county')"
        or die("Sorry your query was not executed");

        $query = mysqli_query($connection,$reg_query)
        or die("The values could not be inserted into the database");

        if(!$query){
            echo "Sorry your account could not be created at the momment please try again later";
        }else
          {
            $_SESSION['newu_fname'] = $fname;
            $_SESSION['email'] = $email;
            header("Location:complete_profile.php?message = 32");  
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
                        <li>New account / Sign in</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>New account</h1>
                        <?php
                            if (isset($_GET["message"])) {
                                $message = $_GET["message"];
                                if ($message == 1) {
                                   ?>
                                   <div class="alert alert-info">
                                        
                                        <p><i style="color:red" class="fa fa-lg fa-warning  ">&nbsp;
                                        </i> Looks Like you already have an account.
                                       <a href="login.php"><i class="fa fa-sign-in"></i> Log in</p></a>
                                    </div>
                                   <?php
                                }
                            }

                         ?>
                        <p class="lead">Not  registered  yet?</p>
                        <p>With registration with our new world of agriculture, fantastic products and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>.</p>

                        <hr>

                        <form action="register.php" method="post" name="register">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <span class="Error" id="errfname">Please fill this</span>
                                <input type="text" name="fname" class="form-control" id="name" required>
                            </div>
                             <div class="form-group">
                                <label for="lname">Last Name</label>
                                <span class="Error" id="errlname">Please fill this</span>
                                <input type="text" name="lname" class="form-control" id="name" required>
                            </div>
                             <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <span class="Error" id="errp_no">Please fill this</span>
                                <input type="text" name="p_no" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <span class="Error" id="erremail">Please fill this</span>
                                <input type="text" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="form-group">     
                                 <label for="county">County</label>
                                 <span class="Error" id="errcounty">Please fill this</span>
                                  <select name="county" class="form-control">
                                        <option value="Baringo">Baringo</option>
                                        <option value="Bomet">Bomet</option>
                                        <option value="Bondo">Bondo</option>
                                        <option value="Bungoma">Bungoma</option>
                                        <option value="Buret">Buret</option>
                                        <option value="Busia">Busia</option>
                                        <option value="Butere/Mumias">Butere/Mumias</option>
                                        <option value="Embu">Embu</option>
                                        <option value="Garissa">Garissa</option>
                                        <option value="Gucha">Gucha</option>
                                        <option value="Homa Bay">Homa Bay</option>
                                        <option value="Ijara">Ijara</option>
                                        <option value="Isiolo">Isiolo</option>
                                        <option value="Kajiado">Kajiado</option>
                                        <option value="Kakamega">Kakamega</option>
                                        <option value="Keiyo">Keiyo</option>
                                        <option value="Kericho">Kericho</option>
                                        <option value="Kiambu">Kiambu</option>
                                        <option value="Kilifi">Kilifi</option>
                                        <option value="Kirinyaga">Kirinyaga</option>
                                        <option value="Kisii Central">Kisii Central</option>
                                        <option value="Kisumu">Kisumu</option>
                                        <option value="Kitui">Kitui</option>
                                        <option value="Koibatek">Koibatek</option>
                                        <option value="Kuria">Kuria</option>
                                        <option value="Kwale">Kwale</option>
                                        <option value="Laikipia">Laikipia</option>
                                        <option value="Lamu">Lamu</option>
                                        <option value="Limuru">Limuru</option>
                                        <option value="Lugari">Lugari</option>
                                        <option value="Machakos">Machakos</option>
                                        <option value="Makueni">Makueni</option>
                                        <option value="Malindi">Malindi</option>
                                        <option value="Mandera">Mandera</option>
                                        <option value="Maragua">Maragua</option>
                                        <option value="Marakwet">Marakwet</option>
                                        <option value="Marsabit">Marsabit</option>
                                        <option value="Mbeere">Mbeere</option>
                                        <option value="Meru Central">Meru Central</option>
                                        <option value="Meru North">Meru North</option>
                                        <option value="Meru South">Meru South</option>
                                        <option value="Migori">Migori</option>
                                        <option value="Mombasa">Mombasa</option>
                                        <option value="Mount Elgon">Mount Elgon</option>
                                        <option value="Murang'a">Murang'a</option>
                                        <option value="Mwingi">Mwingi</option>
                                        <option value="Nairobi">Nairobi</option>
                                        <option value="Nakuru">Nakuru</option>
                                        <option value="Nandi">Nandi</option>
                                        <option value="Narok">Narok</option>
                                        <option value="Nyahururu">Nyahururu</option>
                                        <option value="Nyamira">Nyamira</option>
                                        <option value="Nyandarua">Nyandarua</option>
                                        <option value="Nyando">Nyando</option>
                                        <option value="Nyeri">Nyeri</option>
                                        <option value="Rachuonyo">Rachuonyo</option>
                                        <option value="Samburu">Samburu</option>
                                        <option value="Siaya">Siaya</option>
                                        <option value="Suba">Suba</option>
                                        <option value="Taita Taveta">Taita Taveta</option>
                                        <option value="Tana River">Tana River</option>
                                        <option value="Teso">Teso</option>
                                        <option value="Tharaka">Tharaka</option>
                                        <option value="Thika">Thika</option>
                                        <option value="Trans Mara">Trans Mara</option>
                                        <option value="Trans Nzoia">Trans Nzoia</option>
                                        <option value="Turkana">Turkana</option>
                                        <option value="Uasin Gishu">Uasin Gishu</option>
                                        <option value="Vihiga">Vihiga</option>
                                        <option value="Wajir">Wajir</option>
                                        <option value="West Pokot">West Pokot</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <span class="Error" id="errpassword">Your password can't be empty</span>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit"  class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="container">

                <div class="col-md-6" data-animate="fadeInUp">

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


            </div>
            <!-- /.container -->
        </div>
        <?php include("includes/footer.php"); ?>