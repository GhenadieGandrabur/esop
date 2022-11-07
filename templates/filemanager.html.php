
  
  
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
$dir_name = "img/";
$images = glob($dir_name."*");

?>
  
<div class="row">
<div class="col-2 col-s-2"></div>
<div class="col-8 col-s-8">
<h1>File manager</h1><br>       
<h5>Add a pic</h5><br>
<form method="post" action="" enctype='multipart/form-data'>          
<input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
<label style ="border:1px solid; padding:5px;" for="fileElem">Load an image</label>
</form>
<br>
<?php foreach($images as $image):?>
<div class="gallery">
<?='<img src="'.$image.'"  '?>

<div class="desc"><?=$image?></div>
<?php endforeach;?>
</div>


<div class="col-4 col-s-4"></div>

</div>
    
    <script>
      document.getElementById('hat').style.display='none';
    </script>
