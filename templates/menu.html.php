<div class="mymenu">
   <a href="/">Home</a>
  <div class="downbutton">
    <button class="drdbutton">All about me
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="downbutton-content">
      <a href="/pics/list">Certificates</a>
      <a href="/certificates/aboutme">Resume</a>
      <a href="/article/list">Articles</a>
      <a href="#">Books</a>
      <a href="#">Online Somatic Idiomatic Dictionary (OSID)</a>
    </div>
  </div> 
  <div class="downbutton">
    <button class="drdbutton">ULIM
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="downbutton-content">
      <a href="#">Oral Consecutive Translation</a>
      <a href="#">Conference interpreting</a>
      <a href="#">Specialized Translation</a>
      <a href="#">TAM</a>
      <a href="#">Buisnes Correspondence</a>
    </div>
  </div> 
  <a href="/article/list">Grammar</a>
  <a href="/article/list">International Exam Material</a>
  <a href="/events/list">Events</a>
  <a href="/article/list">Contacts</a>
  
    <?php if ($loggedIn) : ?>
        <a style="float:right ;" href="/logout">Log out</a>
        
      <?php else : ?>
        <a style="float:right ;"  href="/login">Log in</a>
      <?php endif; ?>
</div>