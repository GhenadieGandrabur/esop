<div class="row">
        <div class="col-4 col-s-4">
        
        </div>

<div class="col-4 col-s-4 tc" >
   <h1>Login</h1>
   
<?php
if (isset($error)) :
echo '<div class="errors">' . $error . '</div>';
endif;
?>
   


<form method="post" action="" class='form'>
<table class='formstyle tr'>
<tr><td><label for="email">Your email address:</label></td><td><input type="text" id="email" name="email"></td></tr>
<tr><td><label for="password">Your password:</label></td><td><input type="password" id="password" name="password"></td></tr>
<tr><td></td><td ><input class="button button_save" type="submit"  name="login"  value="Log in"></td></tr>
</table>
</form>        
</div>
        <div class="col-4 col-s-4">
                
        </div>
</div>



