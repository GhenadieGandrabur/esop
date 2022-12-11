<div class="row">
<div class="col-2 col-s-2">
</div>
<div class="col-8 col-s-8">
<h3>Edit exam:</h3>                                    
<form action="" method="post"  class="editform">           
<input id="id" name="exam[id]" value="<?=$exam->id ?? null?>" type="hidden">         
<label for = "topicExams" >Topic of the exam:</label> 
<input   id = "topicExams" name = "exam[topic]" value="<?= $exam->topic ?? '' ?>">
<hr> 
<div class="row">
<div class = "col-4 col-s-4 tc">            
    <p>Current image</p>
<img  id="exam_src" src="/img/<?= $exam->examimage   ?? 'no image.jpg' ?>" width="100" height="auto"> 
</div>
<div class = "col-4 col-s-4 tc"> 

<a class = "button button_edit" href="/filemanager" onclick="handleClick(event)">Select an image to change the old one.</a>          
<input  type="hidden"  id="examsrc" name="exam[examimage]" value="<?=$exam  ->examimage  ?? ''?>">  
</div>
<div class = "col-4 col-s-4 tc"> 
    <p>Selected image.</p>
<img id = "srcsmall" src="/img/no image.jpg" width="100" height="auto"> 
<p style="font-size:10px;"> To save it press Save button below.</p>
</div>
</div>
<hr> 


<p>Type your exam here: </p> 
<textarea id="textarea" name="exam[examText]" rows="30" cols="100%" ><?= $exam  ->examtext   ?? '' ?></textarea> 
<input class='button button_save' type="submit" name="submit" value="Save">    
</form>
</div>        
<div class="col-2 col-s-2"></div>
</div>

<script>
 function handleClick(event) {
            event.preventDefault();
            window.open("/filemanager", "filemanager", "width=800,height=500");
        }

        window.addEventListener('message', function (event) {
            document.getElementById('examsrc').value = event.data;
            let srcpath = document.getElementById('examsrc').value;
            let lastslash = srcpath.lastIndexOf("/");
            let clearedsrc = srcpath.substring(lastslash+1);
            document.getElementById('examsrc').value = clearedsrc;                         
            document.getElementById('srcsmall').src = `/img/${clearedsrc}`;  
        });
</script>
