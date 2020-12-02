
<div class="menu" id="menu">
      <div class="menu__container">
        <div class="menu__header">
          <div class="menu__profile">
                          <!-- Если авторизован выведет приветствие -->
        <?php if(isset($_SESSION['logged_user'])) : ?>
            <img src="img/social/profile 9.png" alt="profile">
              <div class="menu__mid" onclick="location.href='profile.php';" style="cursor: pointer;">
                <div class="menu__login"><?php echo $_SESSION['logged_user']->login; ?></div> 
                </div>
        <?php else : ?>
        <!-- Если пользователь не авторизован выведет ссылки на авторизацию и регистрацию -->
        <img src="img/social/profile 9.png" alt="profile">
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