<?php 
     session_start();
      if (isset($_GET['id'])) {
          $id = $_GET['id'];
      }
      
      if (isset($_GET['message'])) {
        $message = $_GET['message'];
        if ($message == 1) {
          $message = "Lets upload your products pictures , ".$_SESSION['username'];
        }
      }
  ?>
<?php 

    $user_email = $_SESSION['email'];

    if (isset($_POST['upload'])) {
      
    

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

      if(move_uploaded_file($tmp_name, $target_path)){

        $query_upload = "UPDATE users SET imagepath = '$target_path' WHERE id = '$id'" ;
        $result = mysqli_query($connection,$query_upload)
        or die("Sorry could not upload your image at the moment please try again later");
      }else{
        exit("Error while uploading to the server");
      }
    }
  }
  ?>

<?php include("includes/header2.php"); ?>
  <h3><?php echo $message; ?></h3>
  <form action="new_product.php" method="POST" enctype="multipart/form-data">
    <input type="file"name="uploadedimage">
    <input type="submit" name="upload" value="Upload">
  </form>

 