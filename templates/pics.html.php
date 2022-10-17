<br>
<?php if($userId>0):?>
<h5><a class= "button button_edit" href="/adapic.php">Add a pic</a></h5>
<?php endif;?>
<?php foreach ($pics as $pic) : ?>

<div class="gallery">
  <a target="_blank" href="/img/<?=htmlspecialchars($pic['name'], ENT_QUOTES, 'UTF-8')?>">
   <img src="/img/<?=htmlspecialchars($pic['name'], ENT_QUOTES, 'UTF-8')?>" alt="<?=$image?>" width="600" height="400">
  </a>
  
  <div class="desc"><?=htmlspecialchars($pic['image'], ENT_QUOTES,'UTF-8'); ?></div>
  <?php if($userId>0):?>
    <div class="row">
<div class="col"><a class="button button_edit" href="/pic/edit?id=<?= $pic['id'] ?>"> Edit </a></div>

<div class="col">
  <form  action="/pic/delete" method="post">
        <input type="hidden" name="id" value="<?= $pic['id'] ?>">
        <input class="button button_delete" style="float:right"   type="submit" value="Delete"></div>
    </form>
  </div>
  <?php endif;?>
</div>

<?php endforeach;?>

</div>

