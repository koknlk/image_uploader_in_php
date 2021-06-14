<!DOCTYPE html>
<html>
   <head>
       <title>Uploaded images</title> 
       <style>
           body{
               display: flex;
               justify-content: center;
               align-items: center;
               flex-wrap: wrap;
               min-height: 90vh;
           }

           img{
               width: 200px
           }
           a{
               margin: 25px;

           }
       </style>
   </head>
   <body>
       <a href="index.php">&#8995;</a>
       <?php 

          $connect = mysqli_connect("localhost:3306", "root", "root", "sm_test_bd");

          $sql_query = "SELECT * FROM images ORDER BY id DESC";
          $result = mysqli_query($connect, $sql_query);

          if (mysqli_num_rows($result) > 0) {
              while ($images = mysqli_fetch_assoc($result)) { ?>
                  <div class="all">
                      <img src="imageUploads/<?=$images['image_url'] ?>" alt=""/>
                  </div>
                  
           <?php   }
          }
       ?>
   </body>
</html>