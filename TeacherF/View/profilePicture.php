<!DOCTYPE html>
<html>
     <head>
       <style>
      body { background-image: url('../photos/get-started-bg_2_optimized.png');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover; }
    </style>



    
       <script>
       $(document).ready(function(){
            $('#insert').click(function(){
                 var image_name = $('#image').val();
                 if(image_name == '')
                 {
                      alert("Please Select Image");
                      return false;
                 }
                 else
                 {
                      var extension = $('#image').val().split('.').pop().toLowerCase();
                      if(jQuery.inArray(extension, ['jpg', 'jpeg', 'gif', 'png', 'pdf']) == -1)
                      {
                           alert('Invalid Image File');
                           $('#image').val('');
                           return false;
                      }
                 }
            });
       });
       </script>

     </head>
     <body> <?php
    include("header.php");
     ?>
          <br /><br />
          <div class="container" style="width:700px;">
            
               <br />
               <form method="post" action="../controller/changeProfilePicture.php" enctype="multipart/form-data">
                    <input type="file" name="image" id="image" />
                    <br />
                    <input type="submit" name="submit" id="submit" />
               </form>
               <br />
               <br />

          </div>
    <?php
     include("foot.php");
      ?>

      
 </body>
</html>
