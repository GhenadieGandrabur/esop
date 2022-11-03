


<div class="row">
    <div class="col-4 col-s-4">

    </div>
    
    <div class="col-4 col-s-4 " >
        <div class="formborder">
<h2>Edit image</h2>
<div class="formbackground myform">
<form method="post" action="" enctype='multipart/form-data' >
    <input type="file" name="uploadfile">
    <input  type="text" name="$pic['id']" value="<?=$pic['id'] ?? ''?>">  
    <label for="image">Image name</label>
   <input  type="text" name="pic[name]" value="<?=$pic['name']??''?>">
   <label for="image">Image title</label>  
   <input   type="text" name="pic[image]" value="<?=$pic['image']??''?>">
   <div class="tc">
   <input type="submit" value="Submit" name='but_upload'> 
   </div>
</form>
</div>
        </div>

</div>
    <div class="col-4 col-s-4"></div>
    
</div>




