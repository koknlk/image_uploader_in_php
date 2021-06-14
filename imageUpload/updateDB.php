<?php 
class ImageLoader{
     // photo uploader function
       public static function loader(){
         //connection to database
        $connect = mysqli_connect("localhost:3306", "root", "root", "sm_test_bd");

        
      
        if (isset($_POST['submitImage']) && isset($_FILES['updImage'])) {
         

          print_r($_FILES['updImage']);
        

        $photo_Name = $_FILES['updImage']['name'];
        $photo_Size = $_FILES['updImage']['size'];
        $temp_Name = $_FILES['updImage']['tmp_name'];
        $error = $_FILES['updImage']['error'];

        if ($error === 0) {
          if($photo_Size > 325000){
          $unknownError = "Sorry, image too large.";
          header("Location: index.php?error=$unknownError");
        }else {
          $photo_extention = pathinfo($photo_Name, PATHINFO_EXTENSION);
          $photo_extention_lc = strtolower($photo_extention);

          $auth_photo_extensions = array("jpg", "png");

          if (in_array($photo_extention_lc, $auth_photo_extensions)) {
            $unq_photo_id = uniqid("PHT-", true).'.'.$photo_extention_lc;
            $photos_loaded = 'imageUploads/'.$unq_photo_id;
            move_uploaded_file($temp_Name, $photos_loaded);

            // push into database
            $sql = "INSERT INTO images (image_url) VALUES('$unq_photo_id')";
            mysqli_query($connect, $sql);

            
            header("Location: ui.php");
          }else {
            $unknownError = "Only images with extentions jpg and png can be uploaded.";
            header("Location: index.php?error=$unknownError");
          }
        }
      }else {
          $unknownError = "unknown error occurred!.";
          header("Location: index.php?error=$unknownError");
      }

    }else {
      header("Location: index.php");
    }

    if (!$connect) {
      echo "Database connection failed!";
      exit();
  }
 }
}

ImageLoader::loader();
?>