<div class="row">
<div class="col-4 col-s-4">
<?php if(isset($certificate['id'])):?>   

<div style="text-align:center ;"><h2>GET</h2><img id = "" src="/img/<?=$certificate['certificate_src']??''?>" width="100" height="auto">  
<p>Curent image</p>
</div>         
<?php endif;?> 
</div>

<div class="col-4 col-s-4 " >

 

<?php if(!isset($certificate['id'])):?>
<h3 class="tc">Uplaod image into DB</h3>
<?php else:?>
<h3 class="tc">Edit name of image</h3>
<?php endif;?>

<form method="post" action="" enctype='multipart/form-data'>
<table class="formstyle">   
<tr><td></td><td><a class="button button_edit" href="/filemanager">Select an image</a></td>
<!--<td>
  <input type="file" id="pic" name="uploadfile" multiple accept="image/*"  style="display:none" onchange="handleFiles(this.files)">
  <label class="button button_save" for="pic">Select some files</label>
</td> </tr>-->
<tr><th>ID</th>
<td> <input id="id" name="certificate[id]" value="<?=$certificate['id'] ??''?>"></td> </tr>
<tr><th> <label for="certificate_src">Image name</label></th>
<td><input id="certificate_src"  name="certificate[certificate_src]" value="<?=$certificate['certificate_src']??''?>"></td> </tr>
<tr><th> <label for="title">Image title</label>  </th>
<td> <input  name="certificate[certificate_title]" value="<?=$certificate['certificate_title']??''?>"></td> </tr>
<tr><th></th><td><input class="button button_save" type="submit" value="Save" name='uploadfile'> </td> </tr>             
</table>

<script>
const fileInput = document.querySelector("#pic");
fileInput.addEventListener("change", () => {
for (const file of fileInput.files) { 
document.getElementById('certificate_src').value = "";
document.getElementById('certificate_src').value += `${file.name}`;
document.getElementById('pic2').src += `${file.name}`;
}
});
</script>
</form>           
</div> 
<div class="col-4 col-s-4">
<?php if(!isset($certificate['id'])):?>  
<div style="text-align:center;"><h2>POST</h2><img id = "pic2" src="/img/" width="100" height="auto">
<p>Just selected</p>
</div>            
<?php endif;?> 
</div>

</div>





