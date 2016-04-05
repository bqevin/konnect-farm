<?php
  session_start();
  include("includes/connection.php");
  
  ?>
<?php

    $email = $_SESSION['email'];
    if (isset($_POST['upload_profile'])) {

      
      
    

    function GetImageExtension($imagetype){

      if(empty($imagetype)) return false;
      switch($imagetype)
      {
        case 'image/bmp': return '.bmp';
        case 'image/gif': return '.gif';
        case 'image/jpeg': return '.jpg';
        case 'image/png': return '.png';
        default : return false;
      }
    }

    if (!empty($_FILES["uploadedimage"]["name"])) {
      
      $file_name = $_FILES["uploadedimage"]["name"];
      $tmp_name = $_FILES["uploadedimage"]["tmp_name"];
      $imagetype = $_FILES["uploadedimage"]["type"];
      $ext = GetImageExtension($imagetype);
      $imagename = date("d-m-y")."-".time().$ext;
      $target_path = "images/ppics/".$imagename;

      $upload_r = move_uploaded_file($tmp_name,$target_path)
      or die("Could not move the picture");


      if ($upload_r) {
        $query_upload = "UPDATE users SET imagepath = '$target_path' WHERE email = '$email'"
        or die("Could not insert the image");
        $result = mysqli_query($connection,$query_upload)
        or die("Sorry could not upload your image at the moment please try again later");
        if ($result) {
          header("Location:login.php");
        }else{
          header("Location:complete_product_profile.php?message= 2");
        }
        
      }
    
  }
  }
  ?>
<?php include("includes/header2.php"); ?>
  <?php 
  if (isset($_SESSION['newu_fname'])) {
    $new_user = $_SESSION['newu_fname'].", ";
  }else{
    $new_user = "";
  }
  ?>
  <p><?php echo $new_user; ?> Lets upload your profile picture.</p>
  <form action="complete_profile.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="uploadedimage">
    <input type="submit" name="upload_profile" value="Upload">
  </form>
  <?php include("includes/footer.php"); ?>

