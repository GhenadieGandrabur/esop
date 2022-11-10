 

<div class="row">
<div class="col-4 col-s-4">

<div style="text-align:center ;"><h4>Curent image</h4><img id = "" src="/img/<?=$certificate['certificate_src']??'no image.jpg'?>" width="100" height="auto">  
</div>
</div>
<div class="col-4 col-s-4 " >

<?php if(!isset($certificate['id'])):?>
<h3 class="tc">Uplaod image into DB</h3>
<?php else:?>
<h3 class="tc">Edit name of image</h3>
<?php endif;?>

<form method="post" action="" enctype='multipart/form-data'>
<table class="formstyle">   
<tr><td></td><td> <a class = "button button_edit" href="/filemanager" onclick="handleClick(event)">Select an image</a></td>
<!--<td>
  <input type="file" id="pic" name="uploadfile" multiple accept="image/*"  style="display:none" onchange="handleFiles(this.files)">
  <label class="button button_save" for="pic">Select some files</label>
</td> </tr>-->
<tr><th></th>
<td> <input id="id" type="hidden" name="certificate[id]" value="<?=$certificate['id'] ??''?>"></td> </tr>
<tr><th> <label  for="certificate_src"></label></th>
<td><input type="hidden" id="certificat_src"  name="certificate[certificate_src]" value="<?=$certificate['certificate_src']??''?>"></td> </tr>
<tr><th> <label for="title">Image title</label>  </th>
<td> <input id='title' name="certificate[certificate_title]" value="<?=$certificate['certificate_title']??''?>"></td> </tr>
<tr><th></th><td><input class="button button_save" type="submit" value="Save" name='uploadfile'> </td> </tr>             
</table>
</form>           
</div> 
<div class="col-4 col-s-4">
 
<div style="text-align:center;"><h4>You selected this pic</h4><img id = "srcsmall" src="/img/no image.jpg" width="100" height="auto">
</div>            

</div>

</div>

 <script>
        function handleClick(event) {
            event.preventDefault();
            window.open("/filemanager", "filemanager", "width=600,height=500");
        }

        window.addEventListener('message', function (event) {
            document.getElementById('certificat_src').value = event.data;
            let srcpath = document.getElementById('certificat_src').value;
            let lastslash = srcpath.lastIndexOf("/");
            let clearedsrc = srcpath.substring(lastslash+1);
            document.getElementById('certificat_src').value = clearedsrc;                         
            document.getElementById('srcsmall').src = `/img/${clearedsrc}`;            

        });
    </script>





