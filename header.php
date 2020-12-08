<header class="header">
    <nav class="header__nav">
      <div class="header__main">
        <div class="header__logo"><a href="index.php"><img src="img/logo.png" alt=""></a></div>
        <div class="header__bar"></div>
        <form class="search-box" action="search.php">
            <input  class="search-txt" type="text" name="search" placeholder="Поиск...">
            <a class="search-btn" href="#">
              <img class="search-img" src="img/search.png" alt="search">
            </a>
	      	</form>
      
      </div>
      
      <div class="header__rightside">
        <div class="header__select">
          <span id="newsBtn" onclick="location.href='index.php?type=NEWS'">News</span>
          <div class="header__bar"></div>
          <span id="streamBtn" onclick="location.href='index.php?type=LIVE'">Live</span>
        </div>
      <div class="header__menu noclose" onclick="show('menu')"><img src="img/menu.png" alt="MENU"></div>
  </div>
    </nav>
    <div class="header__cm">МЕСТО ДЛЯ ВАШЕЙ РЕКЛАМЫ</div>
  </header>