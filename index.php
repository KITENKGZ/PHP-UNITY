<?php
  include "head.php"
?>
<body>
  <?php
    include "header.php"
  ?>
  <main class="main">
    <div class="container">
    <div class="content news-block" id="NEWS">
          <div class="container_2">
              <div class="content__header">
              <span id="NewsAllBtn" onclick="show('ALLNEWS'); hide('UFCNEWS'); hide('ESPORTNEWS'); hide('FIFANEWS'); paint('NewsAllBtn'); painta('NewsUfcBtn'); painta('NewsEsportBtn'); painta('NewsFifaBtn')" class="all-btn">ВСЕ</span>
              <span id="NewsUfcBtn" onclick="show('UFCNEWS'); hide('ALLNEWS'); hide('ESPORTNEWS'); hide('FIFANEWS'); paint('NewsUfcBtn'); painta('NewsAllBtn'); painta('NewsEsportBtn'); painta('NewsFifaBtn')" class="ufc-btn">MMA</span>
              <span id="NewsEsportBtn" onclick="show('ESPORTNEWS'); hide('UFCNEWS'); hide('ALLNEWS'); hide('FIFANEWS'); paint('NewsEsportBtn'); painta('NewsAllBtn'); painta('NewsUfcBtn'); painta('NewsFifaBtn')" class="esport-btn">E-SPORTS</span>
              <span id="NewsFifaBtn" onclick="show('FIFANEWS'); hide('UFCNEWS'); hide('ALLNEWS'); hide('ESPORTNEWS'); paint('NewsFifaBtn'); painta('NewsAllBtn'); painta('NewsUfcBtn'); painta('NewsEsportBtn')" class="fifa-btn">FIFA</span>
            </div>
          </div>
        <!--здесть должен быть блок-->
        <div class="content__main content__news">
          <?php
          function dump($what) {
            echo '<pre>';print_r($what);echo '</pre>';
          }
          ?>
          <div id="ALLNEWS">
            <?php
            $numOfNews = R::count( 'news' ); 
            $countNews = range(2,$numOfNews+1);
            $news = R::loadAll( 'news', $countNews);
            $i = 0;
            ?>
            <?php foreach( array_reverse($news) as $post): ?>
            <a href="post.php?post_id=<?=$post->id;?>">
              <div class="news-item">
                <img src="<?=$post->img;?>" alt="IMG">
                <div class="news-title"><?=$post->title;?></div>
                <div class="news-bar"></div>
              </div>
            </a>
            <?php
                $i++;
                if ($i % 7 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
              } 
            ?>
            <?php endforeach; ?>
          </div>
          <div id="UFCNEWS" class="none">
            <?php
              $newsufc = R::find( 'news', 'type = ?', array("UFC") );
            ?>
              <?php foreach( array_reverse($newsufc) as $postufc): ?>
                <a href="post.php?post_id=<?=$postufc->id;?>">
              <div class="news-item">
                <img src="<?=$postufc->img;?>" alt="IMG">
                <div class="news-title"><?=$postufc->title;?></div>
                <div class="news-bar"></div>
              </div>
            </a>
              <?php endforeach; ?>
          </div>
          <div id="ESPORTNEWS" class="none">
          <?php
              $newse = R::find( 'news', 'type = ?', array("ESPORT") );
            ?>
              <?php foreach( array_reverse($newse) as $poste): ?>
                <a href="post.php?post_id=<?=$poste->id;?>">
              <div class="news-item">
                <img src="<?=$poste->img;?>" alt="IMG">
                <div class="news-title"><?=$poste->title;?></div>
                <div class="news-bar"></div>
              </div>
            </a>
              <?php endforeach; ?>
          </div>
          <div id="FIFANEWS" class="none">
          <?php
              $newsfifa = R::find( 'news', 'type = ?', array("FIFA") );
            ?>
              <?php foreach( array_reverse($newsfifa) as $postfifa): ?>
                <a href="post.php?post_id=<?=$postfifa->id;?>">
              <div class="news-item">
                <img src="<?=$postfifa->img;?>" alt="IMG">
                <div class="news-title"><?=$postfifa->title;?></div>
                <div class="news-bar"></div>
              </div>
            </a>
              <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="content stream-block" id="STREAM">
        <div class="content__header">
          <span id="allBtn" onclick="show('ALL'); hide('UFC'); hide('ESPORT'); hide('FIFA'); paint('allBtn'); painta('ufcBtn'); painta('esportBtn'); painta('fifaBtn')" class="all-btn">ВСЕ</span>
          <span id="ufcBtn" onclick="show('UFC'); hide('ALL'); hide('ESPORT'); hide('FIFA'); paint('ufcBtn'); painta('allBtn'); painta('esportBtn'); painta('fifaBtn')" class="ufc-btn">MMA</span>
          <span id="esportBtn" onclick="show('ESPORT'); hide('UFC'); hide('ALL'); hide('FIFA'); paint('esportBtn'); painta('allBtn'); painta('ufcBtn'); painta('fifaBtn')" class="esport-btn">E-SPORTS</span>
          <span id="fifaBtn" onclick="show('FIFA'); hide('UFC'); hide('ALL'); hide('ESPORT'); paint('fifaBtn'); painta('allBtn'); painta('ufcBtn'); painta('esportBtn')" class="fifa-btn">FIFA</span>
        </div>
        <div class="content__main content__news">
          <div id="ALL">
          <?php
            $numOfStream = R::count( 'streams' ); 
            $countStreams = range(1,$numOfStream);
            $streams = R::loadAll( 'streams', $countStreams);
            $streammma = R::find( 'streams', 'type = ?', array("UFC") );
            $streamesports = R::find( 'streams', 'type = ?', array("ESPORT") );
            $streamfifa = R::find( 'streams', 'type = ?', array("FIFA") );
            if ($numOfStream > 1) {
              $streams = array_reverse($streams);
            }
            if (count($streammma) > 1) {
              $streammma = array_reverse($streammma);
            }
            if (count($streamesports) > 1) {
              $streamesports = array_reverse($streamesports);
            }
            if (count($streamfifa) > 1) {
              $streamfifa = array_reverse($streamfifa);
            }
            $x = 0;
            ?>
            <?php foreach($streams as $stream): ?>
              <a style="text-decoration: none;" href="stream.php?stream_id=<?=$stream->id;?>">
                <div class="content__mainheader stream__item">
                  <div class="content__mainimg stream__img"><img src="<?=$stream->leftpic;?>"></div>
                  <div class="content__maininfo stream__info">
                    <span><?=$stream->title;?></span>
                    <span><?=$stream->date;?> <?=$stream->time;?></span>
                  </div>
                  <div class="content__mainimg stream__img"><img src="<?=$stream->rightpic;?>"></div>
                </div>
              </a>
            <?php
                $x++;
                if ($x % 7 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
              } 
            ?>
            <?php endforeach; ?>
          </div>
          <div id="UFC" class="none">
          <?php foreach($streammma as $stream): ?>
              <a style="text-decoration: none;" href="stream.php?stream_id=<?=$stream->id;?>">
                <div class="content__mainheader stream__item">
                  <div class="content__mainimg stream__img"><img src="<?=$stream->leftpic;?>"></div>
                  <div class="content__maininfo stream__info">
                    <span><?=$stream->title;?></span>
                    <span><?=$stream->date;?> <?=$stream->time;?></span>
                  </div>
                  <div class="content__mainimg stream__img"><img src="<?=$stream->rightpic;?>"></div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
          <div id="ESPORT" class="none">
          <?php foreach($streamesports as $stream): ?>
              <a style="text-decoration: none;" href="stream.php?stream_id=<?=$stream->id;?>">
                <div class="content__mainheader stream__item">
                  <div class="content__mainimg stream__img"><img src="<?=$stream->leftpic;?>"></div>
                  <div class="content__maininfo stream__info">
                    <span><?=$stream->title;?></span>
                    <span><?=$stream->date;?> <?=$stream->time;?></span>
                  </div>
                  <div class="content__mainimg stream__img"><img src="<?=$stream->rightpic;?>"></div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
          <div id="FIFA" class="none">
          <?php foreach($streamfifa as $stream): ?>
              <a style="text-decoration: none;" href="stream.php?stream_id=<?=$stream->id;?>">
                <div class="content__mainheader stream__item">
                  <div class="content__mainimg stream__img"><img src="<?=$stream->leftpic;?>"></div>
                  <div class="content__maininfo stream__info">
                    <span><?=$stream->title;?></span>
                    <span><?=$stream->date;?> <?=$stream->time;?></span>
                  </div>
                  <div class="content__mainimg stream__img"><img src="<?=$stream->rightpic;?>"></div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
    include "menu.php"
  ?>
    <!-- Прелоадер -->
<div class="preloader"> 
  <div class="preloader__image"> 
    <div class="preloader__change">
      <img src="img/preload/usport.png" alt="usport">
      <img src="img/preload/unews.png" alt="unews">
      <img src="img/preload/uwork.png" alt="uwork">
      <img src="img/preload/ustat.png" alt="ustat">
    </div>
  </div>
</div>
<?php 
  $type = $_GET['type'];
    if($type == "NMMA") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("ALLNEWS").style.display = "none";';
      echo 'document.getElementById("NEWS").style.display = "block";';
      echo 'document.getElementById("UFCNEWS").style.display = "block";';
      echo 'document.getElementById("NewsUfcBtn").style.color = "#FF0000";';
      echo 'document.getElementById("NewsAllBtn").style.color = "#FFFFFF";';
      echo '</script>';        
    } else if($type == "NESPORTS") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("ALLNEWS").style.display = "none";';
      echo 'document.getElementById("NEWS").style.display = "block";';
      echo 'document.getElementById("ESPORTNEWS").style.display = "block";';
      echo 'document.getElementById("NewsEsportBtn").style.color = "#FF0000";';
      echo 'document.getElementById("NewsAllBtn").style.color = "#FFFFFF";';
      echo '</script>';        
    } else if($type == "NFIFA") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("ALLNEWS").style.display = "none";';
      echo 'document.getElementById("NEWS").style.display = "block";';
      echo 'document.getElementById("FIFANEWS").style.display = "block";';
      echo 'document.getElementById("NewsFifaBtn").style.color = "#FF0000";';
      echo 'document.getElementById("NewsAllBtn").style.color = "#FFFFFF";';
      echo '</script>';
    }
    if($type == "MMA") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("NEWS").style.display = "none";';
      echo 'document.getElementById("STREAM").style.display = "block";';
      echo 'document.getElementById("ALL").style.display = "none";';
      echo 'document.getElementById("UFC").style.display = "block";';
      echo 'document.getElementById("ufcBtn").style.color = "#FF0000";';
      echo 'document.getElementById("allBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("streamBtn").style.color = "#FF0000";';
      echo 'document.getElementById("newsBtn").style.color = "#FFFFFF";';
      echo '</script>';        
    } else if($type == "ESPORTS") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("NEWS").style.display = "none";';
      echo 'document.getElementById("STREAM").style.display = "block";';
      echo 'document.getElementById("ALL").style.display = "none";';
      echo 'document.getElementById("ESPORT").style.display = "block";';
      echo 'document.getElementById("esportBtn").style.color = "#FF0000";';
      echo 'document.getElementById("allBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("streamBtn").style.color = "#FF0000";';
      echo 'document.getElementById("newsBtn").style.color = "#FFFFFF";';
      echo '</script>';         
    } else if($type == "FIFA") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("NEWS").style.display = "none";';
      echo 'document.getElementById("STREAM").style.display = "block";';
      echo 'document.getElementById("ALL").style.display = "none";';
      echo 'document.getElementById("FIFA").style.display = "block";';
      echo 'document.getElementById("fifaBtn").style.color = "#FF0000";';
      echo 'document.getElementById("allBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("streamBtn").style.color = "#FF0000";';
      echo 'document.getElementById("newsBtn").style.color = "#FF0000";';
      echo '</script>';  
    } else if($type == "NEWS") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("NEWS").style.display = "block";';
      echo 'document.getElementById("STREAM").style.display = "none";';
      echo 'document.getElementById("NewsAllBtn").style.color = "#FF0000";';
      echo 'document.getElementById("NewsFifaBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("NewsEsportBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("NewsUfcBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("newsBtn").style.color = "#FF0000";';
      echo 'document.getElementById("streamBtn").style.color = "#FFFFFF";';
      echo '</script>';
    } else if($type == "LIVE") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("NEWS").style.display = "none";';
      echo 'document.getElementById("STREAM").style.display = "block";';
      echo 'document.getElementById("allBtn").style.color = "#FF0000";';
      echo 'document.getElementById("fifaBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("esportBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("ufcBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("streamBtn").style.color = "#FF0000";';
      echo 'document.getElementById("newsBtn").style.color = "#FFFFFF";';
      echo '</script>';
    }
?>
</body>
<?php
    include "script.php"
  ?>
</html>
