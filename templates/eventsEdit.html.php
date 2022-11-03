   <div class="row">
   <div class="col-2 col-s-2"></div>
   <div class="col-8 col-s-8">
       <h3>Edit event:</h3>                                    
       <form action="" method="post" enctype="multipart/form-data" class="eventform">           
           <input id="id" name="event[id]" value="<?=$event['id']?? null?>" type="hidden"> <br>       
           <label for = "topic" >Topic of the event:</label><br>
           <input size="100%"  type="text" id ="topic" name="event[topic]" value="<?= $event['topic'] ?? '' ?>"><br><hr><br>
           <div class="row">
            <div class = "col-4 col-s-4 tc">            
                <img src="/img/<?= $event['eventimage'] ?? '' ?>" width="100" height="auto"><br>
                <p>current image</p>
            </div>
            <div class = "col-4 col-s-4 tc"> 
                <p>Change image</p>           
                <input type="hidden" id="image" name="event[eventimage]" value="<?=$event['eventimage']?? ''?>">           
                <input  type="file" id ="pic" name="pic" accept="image/*" >
            </div>
            <div class = "col-4 col-s-4 tc"> 
                <img id = "pic2" src="/img/" width="100" height="auto"><br>
                <p>Just selected</p>
            </div>
           </div>
           <hr><br>
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
           
        
           
           <label for="textarea">Type your event here: </label><br>
           <textarea id="textarea" name="event[eventText]" rows="30" cols="100%" ><?= $event['eventtext'] ?? '' ?></textarea><br>
           <input class='button button_save' type="submit" name="submit" value="Save">    
        </form>
    </div>        
    <div class="col-2 col-s-2"></div>
    </div>
