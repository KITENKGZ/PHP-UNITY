<?php
    include "head.php"
  ?>
<body>
  <?php
    include "header.php"
  ?>
  <?php 
      echo '<script type="text/javascript">';
      echo 'document.getElementById("streamBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("newsBtn").style.color = "#FFFFFF";';
      echo '</script>';
  ?>
  <div class="container">
    <div class="content"> 
      <div class="content__box">
        <div class="content__head">
          <img src="<?php echo $_SESSION['logged_user']->avatar; ?>" alt="profile">
            <div class="content__info">
              <span><?php echo $_SESSION['logged_user']->firstname; ?> <?php echo $_SESSION['logged_user']->lastname; ?></span> 
              <span><?php echo $_SESSION['logged_user']->login; ?></span>
            </div>
          </div>  
          <div class="content__horizontal"></div> 
          <div class="content__wrapper">
            <div class="content__initial">
              <div class="content__left">
                <span>Логин</span>
                <span>Имя</span>
                <span>Фамилия</span>
                <span>Пол</span>
                <span>Д.Р.</span>
                <span>Аватар</span>
                <span>Пароль</span>
              </div>
              <form class="content__right" action="edit.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="login" placeholder="<?php echo $_SESSION['logged_user']->login; ?>">
                <input type="text" name="firstname" placeholder="<?php echo $_SESSION['logged_user']->firstname; ?>">
                <input type="text" name="lastname" placeholder="<?php echo $_SESSION['logged_user']->lastname; ?>">
                <select name="sex" id="sex">
                  <option value="NULL">Не выбрано</option>
                  <option value="1">Мужчина</option>
                  <option value="0">Женщина</option>
                  <?php
                  $sex = $_SESSION['logged_user']->sex;
                  if ($sex == 1) {
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("sex").selectedIndex = "1";';
                    echo '</script>'; 
                  } else if ($sex == 0) {
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("sex").selectedIndex = "2";';
                    echo '</script>'; 
                  }
                  ?>
                </select>
                <input type="date" value="<?php echo $_SESSION['logged_user']->date; ?>"
                min="1960-01-01" max="2020-12-31" name=birthday>
                <div class="input__wrapper">
                  <input name="file" type="file" name="avatar" id="input__file" class="input input__file" multiple>
                  <label for="input__file" class="input__file-button">
                    <span class="input__file-button-text">Загрузить...</span>
                  </label>
                </div>
                <input type="password" name="password" placeholder="********">
                <input name="do_edit" type="submit" class="content__submit" value="Сохранить">
              </form>
            </div>
          </div>
          <!-- тут поставил для прекола Cumиль-->
          
          <div class="content__redact" name="do_edit" type="submit"><span>Сохранить</span></div>
          <!--<input name="do_edit" type="submit" id="input__save" class="content__submit" value="Сохранить">-->
          
        </div>
      </div>  
    </div>
      <div class="content__exit">
      <a href="logout.php"><span>Выйти</span></a>
        </div>
    <footer class="footer">
        <div class="footer__container">
          <div class="footer__logo" >
            <img src="img/logo.png" alt="">
          </div>      
          <div class="footer__social">
            <a href="https://t.me/usport_online"><img src="img/social/telegram.png" alt=""></a>
            <a href="https://twitter.com/usport_online"><img src="img/social/twitter.png" alt=""></a>
            <a href="https://instagram.com/usport.online"><img src="img/social/instagram.png" alt=""></a>
            <a href="https://www.facebook.com/onlineusport/"><img src="img/social/facebook.png" alt=""></a>
            <a href="https://vk.com/usport.online"><img src="img/social/vk.png" alt=""></a>
          </div>    
        </div>  
              <div class="footer__text">
                <span>team unity</span>
              </div>  
    </footer>
    <?php
    include "menu.php"
  ?>
</body>
<?php
    include "script.php"
  ?>
</html>