


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
<input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
<label style ="border:1px solid; padding:5px;" for="fileElem">Load an image</label>
</form>  
<hr>     
<div class="tc">         
    <?php foreach($images as $image):?>     
    <div  style="width:150px; height:230px;  float:left;  margin:5px; position: relative;" class="b">                           
                          
    <img  style="width:100%; max-height: 160px;"  src='<?=$image?>' onclick="pickTheImage(this.src)" > 
    
    <p style="overflow: hidden; font-size:10px; position: absolute;  width: 100%;  bottom: 30px; ">'<?= $image?>'</p>  
    <p style=" position: absolute;  width: 100%;  bottom: 0px;  ">❌</p>  
    </div>                
    <?php endforeach;?>   
</div>
</div>




<div class="col-2 col-s-2">    



</div>
</div>

<script>
document.getElementById('hat').style.display='none';
/**
var getAllImages = document.getElementsByTagName('img');
console.log(getAllImages)
for (var i = 0; i < getAllImages.length; i++) {
(function(x) {
getAllImages[x].addEventListener('click', function() {
document.getElementById('myImage').src = (this.getAttribute('src'))
document.getElementById('srcc').value=(this.getAttribute('src'))
})
}(i))
}*/
function pickTheImage(src) {
    window.opener.postMessage(src,"*");
    window.close();
  }
</script>
