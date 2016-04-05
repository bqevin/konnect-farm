<?php 
session_start();
include("includes/functions.php");
page_restrict();

include("includes/connection.php"); 
?>
<?php 
    $message = ""; 
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        if ($message == 1) {
            $message = "Your Profile has been updated";
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
                        <li>My account</li>
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
                                    <a href="me.php"><i class="fa fa-list"></i> My account</a>
                                </li>
                                <li>
                                    <a href="mywishlist.php"><i class="fa fa-heart"></i> My wishlist</a>
                                </li>
                                <li>
                                    <a href="me.php"><i class="fa fa-user"></i> My orders </a>
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

                <div class="col-md-9">
                    <div class="box">
                        <h1>My account</h1>

                        <p class="lead">View your personal details here.</p>
                        <p class="text-muted">.</p>
                        <hr>

                        <h3>Personal details</h3>
                        <form method="post" action="me.php">
                        <?php 
                                $email = $_SESSION['email'];
                                $query = "SELECT * FROM users WHERE email = '$email'";

                                $q_result = mysqli_query($connection,$query)
                                or die("Query failed");

                                if(!$query){
                                    header("mywishlist.php");
                                }else{

                                while($row = mysqli_fetch_assoc($q_result)){

                                    $fname= $row['fname'];
                                    $lname = $row['lname'];
                                    $county = $row['county'];
                                    $p_no = $row['p_no'];
                                    $email = $row['email'];
                                    $imagepath = $row['imagepath'];

                                }
                                    
                                ?>

                            
                            

                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">profile picture</th>
                                            <?php 
                                            if ($message !== "") {
                                            ?>
                                          
                                            <div class="well"> 
                                              <p style="color:red"><?php echo $message; ?></p>
                                            </div>  
                                            <?php
                                                }
                                            ?>                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="<?php echo $imagepath; ?>"  class="thumbnail" style="width: 100%; max-width: 200px; 
                                                    height: 150px;" class="img-responsive" alt=""/>
                                                </a>
                                            </td>     
                                        </tr>

                                        <tr>                                           
                                            <td>
                                              First Name
                                            </td>
                                            
                                            <td><?php echo $fname; ?></td>                                            
                                        </tr>

                                         <tr>                                           
                                            <td>
                                              Last Name
                                            </td>
                                            
                                            <td><?php echo $lname; ?></td>                                            
                                        </tr>

                                         <tr>                                           
                                            <td>
                                              Phone Number
                                            </td>
                                            
                                            <td><?php echo "(+254)". $p_no; ?></td>                                            
                                        </tr>

                                         <tr>                                           
                                            <td>
                                              E-mail Address
                                            </td>
                                            
                                            <td><?php echo $email; ?></td>                                            
                                        </tr>
                                        <tr>                                           
                                            <td>
                                              County
                                            </td>
                                            
                                            <td><?php echo $county; ?></td>                                            
                                        </tr>


                                    </tbody>                                    
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-right">
                                
                                    <a href="update_my_profile.php"> Update Personal Details</a>
                                  
                                    
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
        <?php
         }
         ?>

              <?php include("includes/footer.php"); ?>