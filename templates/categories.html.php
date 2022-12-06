<div class="row"> 

        <div class = "col-3 col-s-3"></div>   

        <div class = "col-6 col-s-6">            
                <h2>Words categories</h2>            
               <a class="button button_edit" href="/category/edit">Add a new category</a>
                <table id="table_border" >  
                    <?php $n=0?>
                <?php foreach ($categories as $category): ?>
                <tr>  
                <td><?=$n=$n+1?></td>        
                <td> <?=htmlspecialchars($category->name,  ENT_QUOTES, 'UTF-8')?></td>
                <td>  <a href="/category/edit?id=<?=$category->id?>">Edit</a><td>
                <td><form action="/category/delete" method="post">
                <input type="hidden" name="id" value="<?=$category->id?>">
                <input type="submit" value="❌">
                </form></td>
                </tr>
                <?php endforeach; ?>
                </table>
        </div>

        <div class="col-3 col-s-3"> </div> 

</div>  
