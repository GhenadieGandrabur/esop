<div class="row"> 
<div class = "col-4 col-s-4"> Left</div>                                             
        <div class = "col-4 col-s-4"> 
            
            <h2>Categories</h2>            
            <a href="/category/edit">Add a new category</a>.            
            <?php foreach ($categories as $category): ?>
            <?=htmlspecialchars($category->name,  ENT_QUOTES, 'UTF-8')?>
            <a href="/category/edit?id=<?=$category->id?>">Edit</a>
            <form action="/category/delete" method="post">
                <input type="hidden" name="id" value="<?=$category->id?>">
                <input type="submit" value="Delete">
            </form>
            <?php endforeach; ?>
           </div>
<div class = "col-4 col-s-4"> </div> 
</div>                                            