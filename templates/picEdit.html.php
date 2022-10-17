<h5>Edit name of certificate</h5>
<form method="post" action="" >
    <input name="$pic['id']" value="<?=$pic['id'] ?? ''?>"><br>
   <label for="image">Name of certificate</label><br>   
   <input name="pic[name]" value="<?=$pic['name']??''?>"><br>
   <label for="image">Name of certificate</label><br>   
   <input name="pic[image]" value="<?=$pic['image']??''?>"><br>
   <input type="submit" value="Submit"> 
</form>