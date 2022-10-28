     <div class="row"> 
        <div class = "col-4 col-s-4"> </div>                                             
        <div class = "col-4 col-s-4"> 
            <h3>Words</h3>                                             
            <form action="" method="post">
                <input type="hidden" name="word[id]" value="<?= $word['id'] ?? '' ?>">
                
                <label for = "en" >English</label><br>
                <input size="30" type="" id ="en" name="word[en]" value="<?= $word['en'] ?? '' ?>"><br>
                
                <label for="definition">Definition: </label><br>
                <textarea rows="4" cols="50" id="definition" name="word[definition]"><?= $word['definition'] ?? '' ?></textarea><br>
                
                <label for="ro">RO: </label><br>
                <input size="30" id="ro" name="word[ro]" value ="<?= $word['ro'] ?? '' ?>"><br>
                
                <label for="ru">RU: </label><br>
                <input size="30" id="ru" name="word[ru]" value = "<?= $word['ru'] ?? '' ?>"><br>
                
                <label for="category">Category: </label><br>
                <select id='category' name="word[category]">        
                    <option value="<?=$word["category"]=  'economics'?>">Economics</option>
                    <option value="<?=$word["category"]=  'economics2'?>">Economics 2</option>
                    <option value="<?=$word["category"]=  'politics'?>">Politcs</option>
                    <option value="<?=$word["category"]=  'politics2'?>">Politics 2</option>               
                </select><br><br>      
                <input  class="button button_edit" type="submit" name="submit" value="Save">
            </form>
        </div>
            <div class = "col-4 col-s-4"></div>
     </div>
