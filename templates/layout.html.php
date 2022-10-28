<!doctype html>
<html>
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="/myjs.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
  <link rel="stylesheet" href="/article.css">
  <link rel="stylesheet" href="/style.css">
  <link rel="stylesheet" href="/menu.css">
  <link rel="stylesheet" href="/ggstyles.css">
  <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
  <title><?= $title ?></title>
  </head>
  
  <body> 
   <div class="container-fluid my-1" style="text-align:right">
 <a href="https://www.facebook.com/olga.pascari.581" class="fa fa-facebook"></a>
 <a href="https://ms-my.facebook.com/ulim.md/videos/felicitare-olga-pascari-cu-prilejul-29-ani-ulim/231334225578434/" class="fa fa-youtube"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-instagram"></a>    
<a  class="call" style="background-color:blue; padding:5px; color: white;"  href="tel:0037369242290">Call me</a>    
   </div>
    
    
    
    
      <div class="row">
        <div class="col-2 col-s-2 ">
      <img class="img" src="/img/olga.jpg" style="padding:none ;">
    </div>

    <div class="col-10 col-s-10 " style="  position: relative;">
      
      <?php if(isset($pic)):?> 
        <img class="img" src="<?=$pic?>" >
        <div style="position: absolute; bottom:20px; right: 20px;  font-size:28px;color:white; text-shadow: 2px 2px #000000;"  >
          English School Olga Pascari<br>
          Languages open doors                    
        </div>      
        <?php else:?>
          <img class="img" src="/img/headpic.jpg" >
          <div style="position:absolute; top:20px; right:20px; color:white; text-shadow: 2px 2px #000000; font-size:28px" >
            English School Olga Pascari<br>
            Languages open doors                    
          </div>         
          
          <?php endif;?>
          
        </div>
        
      </div>
    
    
    
    
    <?php include "menu.html.php"?>

      
          
          <?= $output?>
          
    
          <script>
    CKEDITOR.replace( 'textarea' );
  </script>
    
    <?php include 'footer.html.php'?>
    
    
  </body>

  </html>