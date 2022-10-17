<div style="width: 300px; ">
<h1>Login</h1>
    <?php
    if (isset($error)) :
        echo '<div class="errors">' . $error . '</div>';
    endif;
    ?>
    <form method="post" action="">
        <label for="email">Your email address</label>
        <input type="text" id="email" name="email">

        <label for="password">Your password</label>
        <input type="password" id="password" name="password"><br>
        <label for="submit"></label>
        <input type="submit" name="login" value="Log in">
    </form>
</div>
