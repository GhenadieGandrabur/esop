<div class="row">
      <div class="col-2 col-s-2 ">
    
      </div>

      <div class="col-8 col-s-8 ">
         <h2 style="padding:12px 18px; color:brown; ">Events:</h2>

            <?php if ($userId>0) : ?>
                <br>
                <a class="button button_edit" href="/events/edit">Add a new event</a>
            <?php endif?>

     

<p>

            <?php $n=0 ?>
                <?php foreach ($events as $event):?>
                
                <h4>  
                <?=$n=$n+1?>.<b> <?= htmlspecialchars($event['topic'], ENT_QUOTES, 'UTF-8') ?></b>
                </h4> 
                <div style="float: left; padding:20px"><img src="/img/<?=$event['eventimage']?>" width="200"></div>
                <p class="tj"> 
                <?= htmlspecialchars($event['eventtext'], ENT_QUOTES, 'UTF-8') ?>
                </p>
                  
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
                
                <?php endforeach; ?>
</p>
      </div>

      <div class="col-2 col-s-2" >
      
      </div>
</div>
