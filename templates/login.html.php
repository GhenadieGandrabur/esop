<div class="row">
        <div class="col-4 col-s-4">
        
        </div>

<div class="col-4 col-s-4" >
   <h1 class="tc">Login</h1>
<?php
if (isset($error)) :
echo '<div class="errors">' . $error . '</div>';
endif;
?>

<form method="post" action="">
<div class="row">
        <div class="col-6">
        <label for="email">Your email address</label>
        </div>
        
<div class="col-6">
<input type="text" id="email" name="email">
</div>

<div class="col-6">
     <label for="password">Your password</label>
</div>

<div class="col-6">
     <input type="password" id="password" name="password">
</div>

<div class="col-6">
    <label for="submit"></label>
</div>


<div class="col-6">
<input class="button-edit" type="submit" name="login" value="Log in">
</div>
</div>
</div>
</form>


        <div class="col-4 col-s-4">
                
        </div>
</div>



