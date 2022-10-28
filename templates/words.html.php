<div class="row">
  <div class="col-2 col-s-2 pd1">
<img class = "img" src="/img/duck_teacher.jpg">
<h4 class="tj">If we teach today’s students as we taught yesterday’s, we rob them of tomorrow.</h4>
<p class="tr"><small>John Dewey</small></p>
    </div>


  <div class="col-10 col-s-10" style="padding:30px ;">
  <h4 style="color:red ; ">Vocabulary</h4>

<p><form action="" method ="get" >
  <label for = "category" >Сhoose a category:</label>
  <select id="category" name="category">
    <option value="economics">Economics</option>
    <option value="politics">Politics</option>    
  </select>
  <input type="submit" value="Submit"> You chose:<b><?= $_GET['category']?></b> category
</p>
<h4><?php if ($userId>0) : ?>
<a class= "button button_edit" href="/word/edit">Add a new word</a>
<?php endif;?>
  </h4>
<table class="wordtable">
    <th>English</th>
    <th>Definition</th>
    <th>Romanian</th>
    <th>Russian</th>
    <?php if($userId > 0):?>
    <th>Category</th>
    <th>Edit</th>
    <th>Delete</th>
     <?php endif;?>
    <?php foreach ($words as $word) : ?>
      <?php if(isset($_GET['category'])?? $category = "economics"): ?>
        
        <tr>
            <td><b><?= htmlspecialchars($word['en'], ENT_QUOTES, 'UTF-8') ?></b></td>
            <td><?= htmlspecialchars($word['definition'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($word['ro'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($word['ru'], ENT_QUOTES, 'UTF-8') ?></td>
          
            <?php if($userId > 0):?>             
              <td><?= htmlspecialchars($word['category'], ENT_QUOTES, 'UTF-8') ?></td>    
              <td>
                 
                 <a class= "button button_edit" href="/word/edit?id=<?= $word['id'] ?>">Edit</a>
              </td>
              <td>
                <form action="/word/delete" method="post">
                  <input type="hidden" name="id" value="<?= $word['id'] ?>">
                  <input class= "button button_delete" type="submit" value="Delete">
                </form>
              </td>
              <?php endif;?>
            </tr> 

   

   <?php endif;?>
   
<?php endforeach; ?>
</table>
  </div>

</div>