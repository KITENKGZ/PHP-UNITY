
<div class="menu" id="menu">
      <div class="menu__container">
        <div class="menu__header">
        <div class="box">
            <div class="top">
              <div class="ellipse1"></div>
              <div class="ellipse2"></div>
            </div>
            <div class="bottom">
              <div class="ellipse1"></div>
              <div class="ellipse2"></div>
              </div>
		      </div>
          <div class="menu__profile">
                          <!-- Если авторизован выведет приветствие -->
        <?php if(isset($_SESSION['logged_user'])) : ?>
            <img src="img/social/profile.png" alt="profile">
              <div class="menu__mid" onclick="location.href='profile.php';" style="cursor: pointer;">
                <div class="menu__login"><?php echo $_SESSION['logged_user']->login; ?></div> 
                </div>
        <?php else : ?>
        <!-- Если пользователь не авторизован выведет ссылки на авторизацию и регистрацию -->
        <img src="img/social/profile.png" alt="profile">
            <div class="menu__mid">
              <div class="menu__login" onclick="show('login'); hide('menu'); hide('reg'); paint('logBtn')">АВТОРИЗАЦИЯ</div> 
              </div>
        <?php endif; ?>
        </div>
        <div class="content__horizontal"></div> 
        </div>
        <div class="menu__cm">МЕСТО ДЛЯ ВАШЕЙ РЕКЛАМЫ</div>
        <div class="menu__logo"><img src="img/logo-white-big.png" alt="LOGO"></div>
        <div class="menu__middle">
              <div class="menu__select">
                  <span>News</span>
                  <div class="menu__bar"></div>
                  <span>Live</span>
              </div>          
        </div>
        <div class="menu__nav">
          <div>MMA</div>
          <div>E-SPORTS</div>
          <div>FIFA</div>
        </div>
                <div class="menu__social">
            <a href="https://t.me/usport_online"><img src="img/social/telegramb.png" alt=""></a>
            <a href="https://twitter.com/usport_online"><img src="img/social/twitterb.png" alt=""></a>
            <a href="https://instagram.com/usport.online"><img src="img/social/instagramb.png" alt=""></a>
            <a href="https://www.facebook.com/onlineusport/"><img src="img/social/facebookb.png" alt=""></a>
            <a href="https://vk.com/usport.online"><img src="img/social/vkb.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  <div class="login" id="login">
    <div class="login__container">
      <div class="login__select">
        <span id="logBtn">Авторизация</span>
        <div class="login__bar"></div>
        <span onclick="show('reg'); hide('login'); hide('menu'); paint('regBtn')">Регистрация</span>
      </div>
      <div class="login__logo">
        <img src="img/logo-white-big.png" alt="LOGO">
      </div>
      <form action="auth.php" class="login__auth" method="POST">
        <input class="inp" name="login" type="text" placeholder="Логин...">
        <input class="inp" name="password" type="password" placeholder="Пароль...">
        <div  class="login__faggottext"><span>неверный логин или пароль</span>
        </div>
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
    <form action="reg.php" class="registr__auth" method="POST">
      <input class="inp" name="login" type="text" placeholder="Логин...">
      <div class="login__has"><span>пользователь с таким логином уже есть</span></div> <!---->
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