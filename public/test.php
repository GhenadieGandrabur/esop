<?php


if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);         
     }
  }
 

?>

<h5>Add a pic</h5>
<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save name' name='but_upload'>
</form>
