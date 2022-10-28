<div class="row">
  <div class="col-2 col-s-2 pd1">
<img class="img" src="/img/duck_teacher.jpg">
<h4 class="tj">If we teach today’s students as we taught yesterday’s, we rob them of tomorrow.</h4>
<p class="tr"><small>John Dewey</small></p>
    </div>


  <div class="col-8 col-s-8">
    <h1>Articles</h1>

    <ol>
    <?php foreach ($articles as $article) : ?>
        <li class="pd05"><a href="#<?= $article['id']?>"><?= $article['topic']?></a></li>
        <?php endforeach; ?>
      </ol>

    <?php if ($userId>0) : ?>
<a class="button button_edit" href="/article/edit">Add a new article</a>
<?php endif;?>
<?php foreach ($articles as $article) : ?>
 
    <h3 id="<?= $article['id']?>"><?= $article['topic']?></h3>
    <p class="tj"><?= $article['articleText'] ?></p>
    <h5 class="pd1"><a href="#top" class="button" style="float:right"><i class="fa fa-arrow-up" aria-hidden="true"> UP</i></a></h5>    
    <br>
    <hr>
          <?php if($userId > 0):?>
          <table class="edittable">
            <tr>
              <td><a class="button button_edit" href="/article/edit?id=<?= $article['id'] ?>">Edit</a></td>
              <td>Date: <?= htmlspecialchars($article['date'], ENT_QUOTES, 'UTF-8') ?></td>
              <td>
                <form action="/article/delete" method="post">
                  <input type="hidden" name="id" value="<?= $article['id'] ?>">
                  <input class="button button_delete" type="submit" value="Delete">
                </form>
              </td>
              </tr>
            </table>
      
    
  
   <?php endif;?>
   
<?php endforeach; ?>
  </div>
<div class="col-2 col-s-2">
  
</div>
</div>