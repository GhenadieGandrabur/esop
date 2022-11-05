<div class="row">
    <div class="col-4 col-s-4">
    <?php if(isset($picture['id'])):?>           
           <div style="text-align:center ;">  <img id = "" src="/img/<?=$picture['name']??''?>" width="100" height="auto">  
           <p>Curent image</p>
           </div>         
             <?php endif;?> 
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

            <?php if(!isset($picture['id'])):?>
            <div style="border:1px blue solid; border-radius:5px; color:blue ">
            <h3>Add a image in the site folder 
            <span style="font-size: 12px; color:red">If it doesn't exists in it.</span></h3>

            <form method="post" action="" enctype='multipart/form-data' name="upload">
            <table class="formstyle">
            <tr><th>Choise a pic</th><td><input type='file' name='file' /></td></tr>
            <tr><th></th><td><input type='submit' value='Save image' name='but_upload'></td></tr>
            </table>
            </form> 
            
          </div>           
            <?php endif;?> 
            <?php if(!isset($picture['id'])):?>
            <h3 class="tc">Uplaod image into DB</h3>
            <?php else:?>
            <h3 class="tc">Edit name of image</h3>
            <?php endif;?>

            <form method="post" action="" enctype='multipart/form-data' name="saveoredit">
            <table class="formstyle">   
            <tr><th>upload a pic</th><td><input id ="pic" type="file" name="uploadfile"></td> </tr>
            <tr><th>ID</th><td> <input  type="text" name="$picture['id']" value="<?=$picture['id'] ?? ''?>">  </td> </tr>
            <tr><th> <label for="name">Image name</label></th><td>   <input id="name" type="text" name="picture[name]" value="<?=$picture['name']??''?>"></td> </tr>
            <tr><th> <label for="image">Image title</label>  </th><td> <input   type="text" name="picture[image]" value="<?=$picture['image']??''?>"></td> </tr>
            <tr><th></th><td><input type="submit" value="Save" name='saveoredit'> </td> </tr>             
          </table>  
          
            <script>
              const fileInput = document.querySelector("#pic");
              fileInput.addEventListener("change", () => {
                for (const file of fileInput.files) { va
                  document.getElementById('name').value = "";
                  document.getElementById('name').value += `${file.name}`;
                  document.getElementById('pic2').src += `${file.name}`;
                }
              });
            </script>
              </form>           
        </div>   
        
        
    <div class="col-4 col-s-4">
             <?php if(!isset($picture['id'])):?>  
             <div style="text-align:center;"><img id = "pic2" src="/img/" width="100" height="auto">
            <p>Just chouse</p>
            </div>            
             <?php endif;?> 
    </div>

</div>





