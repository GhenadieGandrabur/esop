<div class="topnav" id="myTopnav">
   <a href="/">Home</a>
  <div class="dropdown">
    <button class="dropbtn">All about me
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/pics/list">Certificates</a>
      <a href="/certificates/aboutme">Resume</a>
      <a href="/article/list">Articles</a>
      <a href="#">Books</a>
      <a href="#">Online Somatic Idiomatic Dictionary (OSID)</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">ULIM
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Oral Consecutive Translation</a>
      <a href="#">Conference interpreting</a>
      <a href="/sptrans/list">Specialized Translation</a>
      <a href="#">TAM</a>
      <a href="#">Buisnes Correspondence</a>
    </div>
  </div> 
  <a href="/word/list">Vocabulary</a>
  <a href="/article/list">International Exam Material</a>
  <a href="/events/list">Events</a>
  <a href="/article/list">Contacts</a>
  
    <?php if ($loggedIn) : ?>
        <a style="float:right ;" href="/logout">Log out</a>
        
      <?php else : ?>
        <a style="float:right ;"  href="/login">Log in</a>
      <?php endif; ?>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>