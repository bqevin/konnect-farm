<?php 
session_start();
include("includes/connection.php");
 ?>
<?php
    $id = $_SESSION['id'];
    if (isset($_POST['updateprof'])) {
        $fname = mysqli_real_escape_string($connection,$_POST["fname"]);
        $lname = mysqli_real_escape_string($connection,$_POST["lname"]);
        $email = mysqli_real_escape_string($connection,$_POST["email"]);
        $p_no = mysqli_real_escape_string($connection,$_POST["p_no"]);
        $county = mysqli_real_escape_string($connection,$_POST["county"]);


        $update_q = "UPDATE users SET fname='$fname', lname='$lname', email='$email', p_no='$p_no', county='$county' WHERE id = $id"
        or die("Could not update your profile at the momment");

        $update_r = mysqli_query($connection,$update_q)
        or die("Could not update your profile at the momment please try again later");

        if (!$update_r) {
            header("Location: update_my_profile.php");
        }else{
            header("Location: me.php?message=1");
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
                        <h1>Update Profile</h1>

                       
                        
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>.</p>

                        <hr>
                        <?php  
                            $email = $_SESSION['email'];
                            $fetch_update = "SELECT * FROM users WHERE email = '$email'"
                            or die("Update data not fetched");

                            $fetch_result = mysqli_query($connection,$fetch_update)
                            or die("Query not successfull");

                            if(!$fetch_result){
                                echo "Did not fetch the data";
                            }else{

                           while($row = mysqli_fetch_assoc($fetch_result)){

                                    $fname= $row['fname'];
                                    $lname = $row['lname'];
                                    $county = $row['county'];
                                    $p_no = $row['p_no'];
                                    $email = $row['email'];
                                    $imagepath = $row['imagepath'];
                           

                        ?>

                        <form action="update_my_profile.php" method="post" name="update_profile">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <span class="Error" id="errfname">Please fill this</span>
                                <input type="text" value="<?php echo $fname;?>" name="fname" class="form-control" id="name" required>
                            </div>
                             <div class="form-group">
                                <label for="lname">Last Name</label>
                                <span class="Error" id="errlname">Please fill this</span>
                                <input type="text" value="<?php echo $lname;?>" name="lname" class="form-control" id="name" required>
                            </div>
                             <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <span class="Error" id="errp_no">Please fill this</span>
                                <input type="text"  value="<?php echo $p_no;?>"name="p_no" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <span class="Error" id="erremail">Please fill this</span>
                                <input type="text"  value="<?php echo $email;?>"name="email" class="form-control" id="email" required>
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
                            <div class="text-center">
                                <button type="submit" name="updateprof"  class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Update Profile</button>
                            </div>
                        </form>
                        <?php 
                            }
                        }
                         ?>
                    </div>
                </div>


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


            </div>
            <!-- /.container -->
        </div>
        <?php include("includes/footer.php"); ?>