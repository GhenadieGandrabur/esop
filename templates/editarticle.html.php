      <div class="row">    
        <div class="col-2 col-s-2"></div>                                          
        <div class="col-8 col-s-8">
            <form action="" method="post">
                <input type="hidden" name="article[id]" value="<?= $article ->id  ?? '' ?>">
                <label for = "topic" >Topic of the article</label><br>
                <input type="" id ="topic" name="article[topic]" value="<?= $article ->topic  ?? '' ?>"><br>
                
                <label for="textarea">Type your article here: </label><br>
                <textarea id="textarea" name="article[articleText]" rows="10" cols="70%" ><?= $article ->articleText  ?? '' ?></textarea><br>
                <input class="button" type="submit" name="submit" value="Save">                
            </form>
        </div>                                          
        <div class="col-2 col-s-2"></div>                                          
</div>
