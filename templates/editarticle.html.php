<div class="row">    
<div class="col-2 col-s-2"></div>                                          
<div class="col-8 col-s-8">
    <h1>Article editor</h1>
<form action="" method="post" class="editform">
        <input type="hidden" name="article[id]" value="<?= $article->id  ?? '' ?>">
        <label for="topic">Topic of the article</label>
        <input type="text" id ="topic" name="article[topic]" value="<?= $article->topic  ?? '' ?>">
        <p>Type your article here: </p>
        <textarea id="textarea" name="article[articleText]"><?= $article->articleText  ?? '' ?></textarea>
        <input class="button" type="submit" name="submit" value="Save">                
</form>
</div>                                          
<div class="col-2 col-s-2"></div>                                          
</div>
