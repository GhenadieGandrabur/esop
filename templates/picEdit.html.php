


<div class="row">
    <div class="col-4 col-s-4">

    </div>

        <div class="col-4 col-s-4 " >
            <?php

            if(isset($_POST['but_upload'])){
            
            $name = $_FILES['file']['name'];
            $target_dir = "/img/";
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

            <?php if(!isset($pic['id'])):?>
            <h3>Add a image in site folder</h3>
            <form method="post" action="" enctype='multipart/form-data'>
            <table class="formstyle">
            <tr><td><input type='file' name='file' /></td></tr>
            <tr><td><input type='submit' value='Save image' name='but_upload'></td></tr>
            </table>
            </form> 
            
            <h3>Uplaod image into DB</h3>
            <form method="post" action="" enctype='multipart/form-data' >
            <table class="formstyle">   
            <tr><th></th><td>   <input id ="pic" type="file" name="uploadfile"></td> </tr>
            <tr><th></th><td> <input  type="text" name="$pic['id']" value="<?=$pic['id'] ?? ''?>">  </td> </tr>
            <tr><th> <label for="image">Image name</label></th><td>   <input id="image" type="text" name="pic[name]" value="<?=$pic['name']??''?>"></td> </tr>
            <tr><th> <label for="image">Image title</label>  </th><td> <input   type="text" name="pic[image]" value="<?=$pic['image']??''?>"></td> </tr>
            <tr><th></th><td><input type="submit" value="Add to DB" name=''> </td> </tr>               
            </table>   
            <img id = "pic2" src="/img/" width="100" height="auto"><br>
            <script>
              const fileInput = document.querySelector("#pic");
              fileInput.addEventListener("change", () => {
                for (const file of fileInput.files) {
                  document.getElementById('image').value = "";
                  document.getElementById('image').value += `${file.name}`;
                  document.getElementById('pic2').src += `${file.name}`;
                }
              });
            </script>
              </form>
            <?php else:?>
            <h2>Edit image name</h2>
            <form method="post" action="" enctype='multipart/form-data' >
            <table class="formstyle">     
            <tr><th></th><td> <input  type="text" name="$pic['id']" value="<?=$pic['id'] ?? ''?>">  </td> </tr>    
            <tr><th> <label for="image">Image title</label>  </th><td> <input   type="text" name="pic[image]" value="<?=$pic['image']??''?>"></td> </tr>
            <tr><th></th><td><input type="submit" value="Submit" name=''> </td> </tr>
            </table>   
            <?php endif;?>            
        </div>   
        
        
    <div class="col-4 col-s-4">

    </div>
</div>





