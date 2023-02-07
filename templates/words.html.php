    <div class="row">

        <div class="col-2 col-s-2 pd1">        
          <br>
          <h3>Word categories</h3>          
           <ul class="categories" style="float:left;" >
          <li><b><a href="/word/list" >All categories</a></b></li>
          <?php foreach($categories as $category): ?>
          <li <?=(($_GET['categoryId']??false)==$category->id)?"class='active'":""?>><a href="/word/list?categoryId=<?=$category->id?>"><?=$category->name?>&nbsp;<span class="rowsnumber"></span></a><li>
          <?php endforeach; ?>
        </ul>
        </div>
    <div class="col-10 col-s-10" >
         
      <div style="display:flex; width:100%;">
        <div style="width: 70%;"><h1>Vocabulary</h1></div>
        <div >
        <p style="color:#666;" >There are <?= $totalwords?> words in vocabulary.</p>
        </div>
     </div>       
     
                 
       <?php if ($userId>0) : ?>
        <a class= "button button_edit  "  href="/category/list">Manage categories</a>
        <a class= "button button_edit  " href="/word/edit">Add a new word</a>   
        <?php endif;?>
        <input style="float:right;" type="text" id="myInput" onkeyup="findaword()" placeholder="🔍 search a word" title="Insert a word">
        
    <table  id="myTable" class="test">
    <tr class="theader">
    <th>#</th>
    <th>English</th>
    <th>Definition</th>
    <th>Romanian</th>
    <th>Russian</th>
    <?php if($userId > 0):?>
    
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    <?php endif;?>
     <?php $n = 0 ?>
    <?php foreach ($words as $word) : ?>        
    <tr>
    <td><?= $n+=1 ?></td>
    <td><?= htmlspecialchars($word->en, ENT_QUOTES, 'UTF-8')??"" ?></td>
    <td><?= htmlspecialchars($word->definition, ENT_QUOTES, 'UTF-8')??"" ?></td>
    <td><?= htmlspecialchars($word->ro, ENT_QUOTES, 'UTF-8')??"" ?></td>
    <td><?= htmlspecialchars($word->ru, ENT_QUOTES, 'UTF-8')??"" ?></td>
    
    <?php if($userId > 0):?>             
       
    <td>                 
      <a  href="/word/edit?id=<?= $word->id ?>">Edit</a>
    </td>
    <td>
      <form action="/word/delete" method="post">
        <input type="hidden" name="id" value="<?= $word->id ?>">
        <input style="padding:0" type="submit" value="X">
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
    //count numbers of rows in the table
    let numberows = (document.getElementById("myTable")).rows.length-1
    
    if(numberows==0){
      
      document.querySelector(".active .rowsnumber").innerHTML = "0" 
    }else{
      document.querySelector(".active .rowsnumber").innerHTML = "("+numberows+")"
    }
    </script>
</div>
