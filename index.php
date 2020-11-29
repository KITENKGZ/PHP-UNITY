<?php
require "db.php";
require "auth.php";
require "reg.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="keywords" content="Unity, Стримы, Фифа, Футбол, ЮФС, юэфси, юэфс, ufc, fifa, онлайн фифа, кыргызстан футбол, кыргызстан фифа, онлайн юфс, онлайн ufc">
  <title>Unity</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header class="header">
    <nav class="header__nav">
      <div class="header__main">
        <div class="header__logo"><a href="index.html"><img src="img/logo.png" alt=""></a></div>
        <div class="header__bar"></div>
        <div class="header__search"><img src="img/search.png" alt="SEARCH"></div>
      </div>
      <div class="header__select">
        <span>News</span>
        <div class="header__bar"></div>
        <span>Stream</span>
      </form>
      </div>
      <div class="header__menu noclose" onclick="show('menu')"><img src="img/menu.png" alt="MENU"></div>
    </nav>
    <div class="header__cm">МЕСТО ДЛЯ ВАШЕЙ РЕКЛАМЫ</div>
  </header>
  <main class="main">
    <div class="container">
      <div class="content">
        <div class="content__header">
          <span>ВСЕ</span>
          <span>UFC</span>
          <span>ESPORT</span>
          <span>FIFA</span>
        </div>
        <div class="content__main"></div>
      </div>
    </div>
    <div class="menu" id="menu">
      <div class="menu__container noclose">
        <div class="menu__header">
          <div class="menu__profile">
            <img src="img/social/profile 9.png" alt="profile">
            <div class="menu__mid">
              <div class="menu__login" onclick="show('login'); hide('menu'); hide('reg'); paint('logBtn')">АВТОРИЗАЦИЯ</div> 
              </div>
          </div>
        <div class="content__horizontal"></div> 
        </div>
        

        <div class="menu__cm">МЕСТО ДЛЯ ВАШЕЙ РЕКЛАМЫ</div>
        <div class="menu__logo"><img src="img/logo-white-big.png" alt="LOGO"></div>
        <div class="menu__middle">
              <div class="menu__select">
                
                  <span>News</span>
                  <div class="menu__bar"></div>
                  <span>Stream</span>
              </div>          
        </div>
        <div class="menu__nav">
          <div>UFC</div>
          <div>ESPORT</div>
          <div>FIFA</div>
        </div>
                <div class="menu__social">
            <a href="#"><img src="img/social/telegramb.png" alt=""></a>
            <a href="#"><img src="img/social/twitterb.png" alt=""></a>
            <a href="#"><img src="img/social/instagramb.png" alt=""></a>
            <a href="#"><img src="img/social/facebookb.png" alt=""></a>
            <a href="#"><img src="img/social/vkb.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  <div class="login" id="login">
    <div class="login__container noclose">
      <div class="login__select">
        <span id="logBtn">Авторизация</span>
        <div class="login__bar"></div>
        <span onclick="show('reg'); hide('login'); hide('menu'); paint('regBtn')">Регистрация</span>
      </div>
      <div class="login__logo">
        <img src="img/logo-white-big.png" alt="LOGO">
      </div>
      <form action="/index.php" class="login__auth" method="POST">
        <input class="inp" name="login" type="text" placeholder="Логин...">
        <input class="inp" name="password" type="password" placeholder="Пароль...">
        <div class="login__faggot"><a href="forget.php">Забыли пароль?</a></div>
        <input name="do_login" type="submit" class="login__login" value="ВОЙТИ">
      </form>
      <div class="login__socialauth">
        <span>Войти через:</span>
        <div>
          <div><img src="img/gno.png" alt="GOOGLE"></div>
          <div><img src="img/fbno.png" alt="FACEBOOK"></div>
        </div>
      </div>
    </div>
  </div>
<div class="registr" id="reg">
  <div class="registr__container noclose">
    <div class="registr__select">
      <span id="logBtn" onclick="show('login'); hide('reg'); hide('menu'); paint('logBtn')">Авторизация</span>
      <div class="login__bar"></div>
      <span id="regBtn">Регистрация</span>
    </div>
    <div class="registr__logo">
      <img src="img/logo-white-big.png" alt="LOGO">
    </div>
    <form action="/index.php" class="registr__auth" method="POST">
      <input class="inp" name="login" type="text" placeholder="Логин...">
      <input class="inp" name="password" type="password" placeholder="Пароль...">
      <input class="inp" name="email" type="text" placeholder="Почта...">
      <input class="registr__login" name="do_signup" type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ">
    </form> 
    <div class="login__sociallog"> 
      <div class="login__socialauth">
        <span>Войти через:</span>
        <div>
          <div><img src="img/gno.png" alt="GOOGLE"></div>
          <div><img src="img/fbno.png" alt="FACEBOOK"></div>
        </div>
      </div> 
    </div>
  </div>
</div>

</main>
</body>
<script>
  function show(id) {
      document.getElementById(id).style.display = "block";
  }
  function hide(id) {
      document.getElementById(id).style.display = "none";
  }
  function paint(id) {
      document.getElementById(id).style.color = "#FF0000";
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
  </script>
</html>