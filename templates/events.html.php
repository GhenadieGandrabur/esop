<div class="row" style="min-height:1000px ;">
      <div class="col-2 col-s-2 ">
            
      </div>

      <div class="col-8 col-s-8 ">
         <h2 style="padding:12px 18px; color:brown; ">Events:</h2>
            <?php if ($userId>0) : ?>
                <br>
                <a class="button button_edit" href="/events/edit">Add a new event</a>
            <?php endif?>

     

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

      <div class="col-2 col-s-2" >
      
      </div>
</div>