                                                    
    <form action="" method="post">
        <input type="hidden" name="article[id]" value="<?= $article['id'] ?? '' ?>">
        <label for = "topic" >Topic of the article</label><br>
        <input type="" id ="topic" name="article[topic]" value="<?= $article['topic'] ?? '' ?>"><br>

        <label for="articleText">Type your article here: </label><br>
        <textarea id="articletext" name="article[articleText]" rows="10" cols="70%" ><?= $article['articleText'] ?? '' ?></textarea><br>
        <input type="submit" name="submit" value="Save">
    
    </form>
