<div class="row ">
        <div class="col-3 col-s-3">
        
        </div>

<div class="col-6 col-s-6  tc" >
   <h1>Login</h1>
   
<?php
if (isset($error)) :
echo '<div class="errors">' . $error . '</div>';
endif;
?>
   


<form method="post" action="" class='log'>

  <label for="email">Your email address:</label></td><td><input type="text" id="email" name="email">  
  <label for="password">Your password:</label></td><td><input type="password" id="password" name="password">  
  <input  type="submit"  name="login"  value="Log in">  

</form>        
</div>
        <div class="col-3 col-s-3">                
        </div>
</div>



