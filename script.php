<script>
  function show(id) {
      document.getElementById(id).style.display = "block";
  }
  function showf(id) {
      document.getElementById(id).style.display = "flex";
  }
  function hide(id) {
      document.getElementById(id).style.display = "none";
  }
  function paint(id) {
      document.getElementById(id).style.color = "#FF0000";
  }
  function painta(id) {
      document.getElementById(id).style.color = "#FFFFFF";
  }
  var container = document.getElementsByClassName('header__menu')[0];
  var container1 = document.getElementsByClassName('menu__container')[0];
  var container2 = document.getElementsByClassName('login__container')[0];
  var container3 = document.getElementsByClassName('registr__container')[0];
document.addEventListener('click', function( event ) {
  if ((container !== event.target && !container.contains(event.target)) && (container1 !== event.target && !container1.contains(event.target)) && (container2 !== event.target && !container2.contains(event.target)) && (container3 !== event.target && !container3.contains(event.target))) {    
    document.getElementById("menu").style.display = "none";
    document.getElementById("login").style.display = "none";  
    document.getElementById("reg").style.display = "none";
  }
});


  window.onload = function () {
    document.querySelector(".preloader").style.display = "none";     
    }
 
  </script>