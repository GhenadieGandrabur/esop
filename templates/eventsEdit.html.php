   <div class="row">
   <div class="col-2 col-s-2"></div>
   <div class="col-8 col-s-8">
       <h3>Edit event:</h3>                                    
       <form action="" method="post">
           <label for="id">ID</label><br>
           <input id="id" name="event[id]" value="<?=$event['id']?? null?>" readonly> <br>       
           <label for = "topic" >Topic of the event:</label><br>
           <input type="" id ="topic" name="event[topic]" value="<?= $event['topic'] ?? '' ?>"><br>
           <label for="eventText">Type your event here: </label><br>
           <textarea id="eventtext" name="event[eventText]" rows="30" cols="100%" ><?= $event['eventtext'] ?? '' ?></textarea><br>
           <input type="submit" name="submit" value="Save">    
        </form>
    </div>        
    <div class="col-2 col-s-2"></div>
    </div>
