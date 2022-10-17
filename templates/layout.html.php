<!doctype html>
<html>
  
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    
    <link rel="stylesheet" href="/article.css">
    <title><?= $title ?></title>
  </head>
  
  <body> 
    
    
    <div class="container-fluid" style="text-align:right ;">
    <a href="tel:0037369242290"> <i class="	fa fa-phone"></i>Call me </a>
    </div>
   
    
    
    <div class="container-fluid" >
      <div class="row">
        <div class="col-2 " >
      <img src="/img/olga.jpg" width="100%" height="100%">
        </div>
        <div class="col-10 " style="position:relative;  ">
         
          <?php if(isset($pic)):?> 
            <img src="<?=$pic ?? "" ?>"  width="100%" height="300";>
             <div style="position:absolute; top:200px; right:100px; color:white; text-shadow: 2px 2px #000000; font-size:28px" >
                 English School Olga Pascari<br>
                 Languages open doors                    
                 </div>      
            <?php else:?>
              <img src="/img/headpic.jpg" width="1950" height="300";>
           <div style="position:absolute; top:200px; right:100px; color:white; text-shadow: 2px 2px #000000; font-size:28px" >
                 English School Olga Pascari<br>
                 Languages open doors                    
                 </div>         
              
              <?php endif;?>
            
        </div>

          </div>
        </div>
        
        
        
        <?php include "menu.html.php"?>

        <div class="container-fluid">
          <div class="row">
      <div class="col-3 ">
        
        <div style="padding:20px;">
          <img src="/img/duck.jpg" width="100%">
        </div>
      </div>
      <div class="col-9">
        
      <?= $output?>
      
    </div>
   
  </div>
</div>





<?php include 'footer.html.php'?>


</body>

</html>