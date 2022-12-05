


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
$dir_name =  "img/";
$images = glob($dir_name."*");
?>

<div class="row b">
<div class="col-2 col-s-2">

</div>

<div class="col-8 col-s-8 ">

<h1>File manager</h1>     
<h5>Add a pic</h5>
<form method="post" action="" enctype='multipart/form-data'>          
<input name="fileload" type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
<label style ="border:1px solid; padding:5px;" for="fileElem">Load an image</label>
</form>  
<hr>     
<div class="tc">         
    <?php foreach($images as $image):?>     
    <div id="cros"  style="width:75px; height:auto;  float:left;  margin:5px; position: relative;" class="b">                           
                          
    <img  style="width:100%; max-height: 160px;"  src='<?=$image?>' onclick="pickTheImage(this.src)" > 
    
  
  <form action="" method="POST">
    <input type="hidden" name="picForDelete" value="<?=$image?>">
    <input type="submit" value="❌">
  </form> 
    </div>                
    <?php endforeach;?>   
</div>
</div>

<div class="col-2 col-s-2">    



</div>
<form action="" method="POST">
  <input name="test" >
  <input type="submit" value="najati">
</form>

<?php
echo "Test";
var_dump($_POST);
foreach($_POST as $key=>$pp){
  echo $key .'---' .$pp .'<br>';
}

?>
</div>

<script>
document.getElementById('hat').style.display='none';

function pickTheImage(src) {
    window.opener.postMessage(src,"*");
    window.close();
  }
 
</script>
