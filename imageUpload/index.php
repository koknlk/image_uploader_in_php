
<!DOCTYPE html>
<html>
   <head>
       <title>GET Uploaded images</title>
       
   </head>
   <body>
   <?php if (isset($_GET['error'])): ?> 
         <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>

      <form action="updateDB.php" method="post" enctype="multipart/form-data">
          <input type="file"  name="updImage"/>
           
          <input type="submit"  name="submitImage" value="Upload"/>
      </form>
   </body>
</html>