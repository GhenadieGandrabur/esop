    <div class="row">

        <div class="col-2 col-s-2 pd1">
            <img class = "img" src="/img/duck_teacher.jpg">
            <h4 class="tj">If we teach today's students as we taught yesterday's, we rob them of tomorrow.</h4>
            <p class="tr"><small>John Dewey</small></p>
        </div>

    <div class="col-10 col-s-10" >
      <div style="display:flex; width:100%;">
        <div style="width: 70%;"><h1>Vocabulary</h1></div>
        <div >
        <p style="color:#666;" >There are <?= $totalwords?> words in vocabulary.</p>
        </div>
     </div>       
     <p>
       <a class= "button button_edit"  href="/word/list">All words</a>          
       <?php if ($userId>0) : ?>
        <a class= "button button_edit"  href="/category/list">Manage categories</a>
        <a class= "button button_edit" href="/word/edit">Add a new word</a>   
        <?php endif;?>
      Filter by a category: 
     <?php foreach($categories as $category):?>
     <a class="button" href="/word/list?categoryId=<?=$category->id?>">   <?=$category->name?></a>     
     <?php endforeach;?>
      <input type="text" id="myInput" onkeyup="findaword()" placeholder="Find a word" title="Insert a word">
    </p>     
        
    <table  id="myTable">
    <tr class="theader">
    <th>English</th>
    <th>Definition</th>
    <th>Romanian</th>
    <th>Russian</th>
    <?php if($userId > 0):?>
    
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    <?php endif;?>

    <?php foreach ($words as $word) : ?>        
    <tr>
    <td><?= htmlspecialchars($word->en, ENT_QUOTES, 'UTF-8') ?></td>
    <td><?= htmlspecialchars($word->definition, ENT_QUOTES, 'UTF-8') ?></td>
    <td><?= htmlspecialchars($word->ro, ENT_QUOTES, 'UTF-8') ?></td>
    <td><?= htmlspecialchars($word->ru, ENT_QUOTES, 'UTF-8') ?></td>
    
    <?php if($userId > 0):?>             
       
    <td>                 
      <a class= "button button_edit" href="/word/edit?id=<?= $word->id ?>">Edit</a>
    </td>
    <td>
      <form action="/word/delete" method="post">
        <input type="hidden" name="id" value="<?= $word->id ?>">
        <input class= "button button_delete" type="submit" value="Delete">
      </form>
    </td>
    <?php endif;?>
    </tr> 
    
    
    <?php endforeach; ?>
    </table>
    </div>
    
    
    <script>
    function findaword() {
      var input, filter, table, tr, td, tds, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        let iscontaine = false;
//td = tr[i].getElementsByTagName("td")[0];
        tds = tr[i].getElementsByTagName("td");   
        Array.from(tds).forEach(td => {
          if (!iscontaine) {
            txtValue = td.textContent || td.innerText;
            console.log(txtValue,txtValue.toUpperCase().indexOf(filter),i);
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
             tr[i].style.display = "";
             iscontaine = true;
            } else {
             tr[i].style.display = "none";
            }
          }   
        });   
        
      }
    }


    </script>
</div>
