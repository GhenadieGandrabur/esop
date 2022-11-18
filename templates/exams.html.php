<div class="row">
<div class="col-2 col-s-2 ">
</div>
<div class="col-8 col-s-8 ">
<h2 style="padding:12px 18px; color:brown; ">exams:</h2>
<?php if ($userId>0) : ?>
<br>

<a class="button button_edit" href="/exams/edit">Add a new exam</a>
<?php endif?>

<ol>
<?php foreach ($exams as $exam):?>
<li style="padding:5px ;"><a href="<?='#'. $exam['id']?>"><?= $exam['topic']?></a></li>
<?php endforeach; ?>
</ol>
<?php foreach ($exams as $exam):?>
<br>
<h4 id="<?= $exam['id']?>"><b> <?=  $exam['topic']?></b></h4>
<p  class="tj">
<img id="myImg" onclick="myFunc(this)" style="float:left; margin-right:15px; width:100%; max-width:150px "  src="/img/<?=$exam['examimage']?>" alt="<?=$exam['image_text']??''?>">
    
    <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
    </div>

<?= $exam['examtext']?>
</p>
<h5><a href="#top" class="button" style="float:right"><i class="fa fa-arrow-up" aria-hidden="true"> UP</i></a></h5> 
</p>
<hr>

<?php if ($userId>0) : ?>
<table>
<tr>
<td> <a class="button button_edit"  href="/exams/edit?id=<?= $exam['id'] ?>">Edit</a> </td>
<td>
<form action="/exams/delete" method="post">
<input type="hidden" name="id" value="<?= $exam['id'] ?>">
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
