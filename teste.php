<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_FILES['image'])){
       $errors= array();
       $file_name = $_FILES['image']['name'];
       $file_size =$_FILES['image']['size'];
       $file_tmp =$_FILES['image']['tmp_name'];
       $file_type=$_FILES['image']['type'];
       $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
       
       $extensions= array("jpeg","jpg","png");
       
       if(in_array($file_ext,$extensions)=== false){
          $errors[]="extension not allowed, please choose a JPEG or PNG file.";
       }
       
       if($file_size > 2097152){
          $errors[]='File size must be excately 2 MB';
       }
       
       if(empty($errors)==true && isset($_FILES['image'])==true){
          move_uploaded_file($file_tmp,"images/teste/".$file_name);
          echo "Success com isset". $file_name;
       }else{
          print_r($errors);
       }
    }
}
?>
<html>
   <body>
      
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html>