     <div class="row"> 
        <div class = "col-3 col-s-3"> </div>                                             
        <div class = "col-6 col-s-6"> 
            <h1>Words of dictionary</h1>            
            <form action="" method="post" class="formwork"> 
                <input type="hidden" name="word[id]" value="<?= $word->id  ?? '' ?>">
                
                <label for = "en" >English</label>
                <input  id ="en" name="word[en]" value="<?= $word->en  ?? '' ?>">
                
                <label for="definition">Definition: </label>
                <textarea rows="4" cols="100"  id="definition" name="word[definition]"><?= $word->definition  ?? '' ?></textarea>
                
                <label for="ro">RO: </label>
                <input  id="ro" name="word[ro]" value ="<?= $word->ro  ?? '' ?>">
                
                <label for="ru">RU: </label>
                <input  id="ru" name="word[ru]" value = "<?= $word->ru  ?? '' ?>">
                
                 <label for="category"><b>Words categories:</b></label>
                <?php foreach ($categories as $category): ?>            
                <input type="checkbox" name="category[]" value="<?=$category->id?>" <?= in_array($category->id.'',$categoriesId)?'checked selected':''?>/> 
                <label><?=$category->name?></label>
                <?php endforeach; ?>     
                <input  type="submit" name="submit" value="Save">
                
            </form>
        </div>
            <div class = "col-3 col-s-3"></div>
     </div>
