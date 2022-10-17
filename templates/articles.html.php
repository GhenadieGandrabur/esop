
    <?php if ($userId>0) : ?>
<a href="/article/edit"><h3 style="border:1px solid ; padding: 8px 10px; width: 300px; " >Add a new article</h3></a>
<?php endif;?>
<?php foreach ($articles as $article) : ?>
 
    <h3>
      <?= htmlspecialchars($article['topic'], ENT_QUOTES, 'UTF-8') ?>
</h3>
    <p>
      <?= htmlspecialchars($article['articleText'], ENT_QUOTES, 'UTF-8') ?>
    </p>
     
      
    
        <?php if($userId > 0):?>
          <table width="100%">
            <tr>
              <td>Date: <?= htmlspecialchars($article['date'], ENT_QUOTES, 'UTF-8') ?></td>
              <td>
                 
                 <a href="/article/edit?id=<?= $article['id'] ?>">Edit</a>
              </td>
              <td>
                <form action="/article/delete" method="post">
                  <input type="hidden" name="id" value="<?= $article['id'] ?>">
                  <input  type="submit" value="Delete">
                </form>
              </td>
              </tr>
            </table>
      
    
  
   <?php endif;?>
   
<?php endforeach; ?>