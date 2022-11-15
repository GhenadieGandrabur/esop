<div class="row">
<div class="col-2 col-s-2">
<h3>He who dares to teach must never cease to learn.</h3>
<small>John Cotton Dana</small>
</div>

<div class='col-8 col-s-8'>
  <h1>Certificates</h1>
<?php if($userId>0):?>
<h5><a class= "button button_edit" href="/certificate/edit">Add an image</a></h5>
<?php endif;?>
<?php foreach ($certificates as $certificate) : ?>

  <div class="gallery ">
    <img id="myImg" onclick="myFunc(this)"  src="/img/<?=$certificate['certificate_src']?>" alt="<?=$certificate['certificate_title']?>">
  
    <div id="myModal" class="modal b">
    <span class="close">❎</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>

 
  
  <?php if($userId>0):?>
    <div class="editor">
      <a class="editbuton" href="/certificate/edit?id=<?= $certificate['id'] ?>">Edit</a>      
      <form  action="/certificate/delete" method="post">
        <input type="hidden" name="id" value="<?= $certificate['id'] ?>">
        <input class="crosdelite" style="float:right"   type="submit" value="X">      
      </form>
    </div>
    <?php endif;?>
    
  </div>
    <?php endforeach;?>

</div>

</div>
<div class="row">
<div class="col-2 col-s-2">

</div>
<script>

</script>
</div>

