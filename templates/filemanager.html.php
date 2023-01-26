


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

<div class="row ">
<div class="col-2 col-s-2">

</div>

<div class="col-8 col-s-8 ">

<h1>File manager</h1>     
<h5>Add a pic</h5>
<form method="post" action="" enctype='multipart/form-data'>          
<input name="fileload" type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
<label style ="border:1px solid; padding:5px;" for="fileElem">Load an image</label>
</form>  
   <br>
 
    <?php $n = 0 ?>   
    <?php foreach($images as $image):?>  
      <?php $n = $n+1 ?>  
        <div style="width:100px; height:100px; display:inline-block; border:1px black solid; overflow:hidden; position:relative; padding:5px" class="tc"> 
      <div style="position: absolute; top:5px; left:5px; font-size:6px; "><?=$n?></div>                      
     <div id="pic"> <img   style="width: 50px;"  src='<?=$image?>' onclick="pickTheImage(this.src)" > </div>                      
                       
        <div style="position: absolute; bottom:3px; right:3px;"><form action="" method="POST">
    <input type="hidden" name="picForDelete" value="<?=$image?>">
    <input type="submit" value="❌" style="width:5px; font-size:6px; margin:auto">
  </form> </div> 
        </div>            
    <?php endforeach;?> 
   
</div>

<div class="col-2 col-s-2">    



</div>


</div>

<script>
document.getElementById('hat').style.display='none';

function pickTheImage(src) {
    window.opener.postMessage(src,"*");
    window.close();
  }

  const test = document.getElementById("pic");
  test.addEventListener("mouseover", (event) => {
  // highlight the mouseenter target

  event.target.style.display = "none"}
  
  )
</script>
