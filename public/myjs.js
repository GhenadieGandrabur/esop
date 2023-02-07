function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}


  var modal = document.getElementById("myModal");
   var img = document.getElementById("myImg");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  function myFunc(el) {
    var ImgSrc = el.src;
    var altText = el.alt;
  modal.style.display = "block";
  modalImg.src = ImgSrc;
  captionText.innerHTML = altText;
                  }
  var span = document.getElementsByClassName("close")[0];
  if(span){
    span.onclick = function () {
      modal.style.display = "none";
    }    
  }



