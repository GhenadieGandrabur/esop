
<div class="row"> 

<div class = "col-3 col-s-3"></div>   

<div class = "col-6 col-s-6 tc"> 
    <h1>Category</h1>    
    <form action="" method="post" class="log">
        <input type="hidden"  name="category[id]"  value="<?=$category->id ?? ''?>">
        <label for="categoryname">Enter category name:
            </label>
            <input type="text"  id="categoryname"  name="category[name]"   value="<?=$category->  name ?? ''?>" />
            <input type="submit" name="submit" value="Save">
        </form>
</div>
        <div class = "col-3 col-s-3"></div>   
</div>