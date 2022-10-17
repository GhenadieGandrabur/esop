<div class="row" >
<div class="col">
<?php if ($userId>0) : ?>
<br>
<a class="button button_edit" href="/events/edit">Add a new event</a>
<?php endif?>

<h3 style="padding:12px 18px; color:brown">Events:</h3>
<hr>
<?php $n=0 ?>
<?php foreach ($events as $event) : ?>

  <h4>  
<?=$n=$n+1?>.<b> <?= htmlspecialchars($event['topic'], ENT_QUOTES, 'UTF-8') ?></b>
  </h4> 
   <h4> 
    <?= htmlspecialchars($event['eventtext'], ENT_QUOTES, 'UTF-8') ?>
</h4>

  <?php if ($userId>0) : ?>
    <table>
      <tr>
        <td> <a class="button button_edit"  href="/events/edit?id=<?= $event['id'] ?>">Edit</a> </td>
        <td>
          <form action="/events/delete" method="post">
            <input type="hidden" name="id" value="<?= $event['id'] ?>">
            <input class="button button_delete" type="submit" value="Delete">
          </form>
        </td>
      </tr>
    </table>
   
    <?php endif?>
    <hr>
    
      
<?php endforeach; ?>
</div>
<div class="col success text-center p-3">
  <img src="/img/event.jpg">
</div>
</div>