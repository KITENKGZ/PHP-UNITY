<header class="header">
    <nav class="header__nav">
      <div class="header__main">
        <div class="header__logo"><a href="index.php"><img src="img/logo.png" alt=""></a></div>
        <div class="header__bar"></div>
        <div class="header__search"><img src="img/search.png" alt="SEARCH"></div>
      </div>
      <div class="header__rightside">
        <div class="header__select">
          <span id="newsBtn" onclick="show('NEWS'); hide('STREAM'); paint('newsBtn'); painta('streamBtn'); show('ALLNEWS'); hide('UFCNEWS'); hide('ESPORTNEWS'); hide('FIFANEWS'); paint('NewsAllBtn'); painta('NewsUfcBtn'); painta('NewsEsportBtn'); painta('NewsFifaBtn')" class="news-btn">News</span>
          <div class="header__bar"></div>
          <span id="streamBtn" onclick="show('STREAM'); hide('NEWS'); paint('streamBtn'); painta('newsBtn'); show('ALL'); hide('UFC'); hide('ESPORT'); hide('FIFA'); paint('allBtn'); painta('ufcBtn'); painta('esportBtn'); painta('fifaBtn')" class="stream-btn">Stream</span>
        </div>
      <div class="header__menu noclose" onclick="show('menu')"><img src="img/menu.png" alt="MENU"></div>
  </div>
    </nav>
    <div class="header__cm">МЕСТО ДЛЯ ВАШЕЙ РЕКЛАМЫ</div>
  </header>