<div class="row">
<div class="col-2 col-s-2 ">
</div>
<div class="col-8 col-s-8 ">
<h2 style="padding:12px 18px; color:brown; ">Events:</h2>
<?php if ($userId>0) : ?>
<br>

<a class="button button_edit" href="/events/edit">Add a new event</a>
<?php endif?>

<ol>
<?php foreach ($events as $event):?>
<li style="padding:5px ;"><a href="<?='#'. $event->id ?>"><?= $event->topic ?></a></li>
<?php endforeach; ?>
</ol>
<?php foreach ($events as $event):?>
<br>
<h1 id="<?= $event->id ?>"><b> <?=  $event->topic?></b></h1>
<div class="row">
<div class="col-3 col-s-3 ">
<p><img id="myImg" onclick="myFunc(this)" style="float:left; margin-right:15px; width:100%; max-width:150px "  src="/img/<?=$event->eventimage ?>" alt="<?=$event->image_text ??''?>"></p>
    
    <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
    </div>
</div>

<div class="col-9 col-s-9 ">
<span  class="tj"><?= $event->eventtext ?></span>
</div>

<h5><a href="#top" class="button" style="float:right"><i class="fa fa-arrow-up" aria-hidden="true"> UP</i></a></h5> 
<hr>

<?php if ($userId>0) : ?>
<table>
<tr>
<td> <a class="button button_edit"  href="/events/edit?id=<?= $event->id ?>">Edit</a> </td>
<td>
<form action="/events/delete" method="post">
<input type="hidden" name="id" value="<?= $event->id ?>">
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
